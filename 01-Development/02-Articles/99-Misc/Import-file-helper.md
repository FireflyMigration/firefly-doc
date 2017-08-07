I needed to import a file with 300 different fields, but no clear view of it's structure.

I needed a screen where I can set the position and width of the columns, and then import based on it, so I've created the Import Helper.

It's not polished, but if you want you can use it.

## usage
```csdiff
protected override void OnLoad()
{
    Exit(ExitTiming.BeforeRow, () => _io.EndOfFile);
    Activity = Activities.Insert;

    _io = new ENV.IO.FileReader("file.TXT") ;
    Streams.Add(_io);

+   _importHelper = new ImportHelper("ImportSettings.xml", Columns.ToArray());
}
+ImportHelper _importHelper;
protected override void OnLeaveRow()
{
+   var x = _io.ReadLine();
+   if (false)
+       _importHelper.ShowSettingsScreen(x);
+   _importHelper.ReadLine(x);
}
```

## source code
```csdiff
class ImportHelper
{
    ENV.Data.DataProvider.MemoryDatabase mdb = new ENV.Data.DataProvider.MemoryDatabase();
    Dictionary<int, ColumnBase> _columnsMap = new Dictionary<int, ColumnBase>();
    string _settingsFileName;
    public ImportHelper(string settingsFileName,ColumnBase[] columns)
    {
        _settingsFileName = settingsFileName;
        _columnsMap.Clear();
        var ih = new ImportHelperEntity(mdb);
        if (System.IO.File.Exists(settingsFileName))
        {
            mdb.DataSet.Clear();
            ih.Insert(() => ih.ID.Value = 1);
            ih.Truncate();
            mdb.DataSet.ReadXml(settingsFileName);
        }


        int left = 1;
        foreach (var item in columns)
        {

            ih.Left.BindValue(() => left);
            ih.Width.BindValue(() => item.FormatInfo.MaxLength);
            ih.Order.BindValue(ih.ID);
            ih.InsertIfNotFound(ih.ID.BindEqualTo(() => _columnsMap.Count + 1), () =>
            {
                ih.ColumnName.Value = item.Caption;
                ih.Info.Value = UserMethods.GetAttribute(item) + ":" + item.Format;
                _columnsMap.Add(ih.ID, item);

                left += 1 + ih.Width;
            });


        }
    }
    class ImportHelperEntity : ENV.Data.Entity
    {

        [PrimaryKey]
        public readonly NumberColumn ID = new NumberColumn("ID", "3");
        public readonly NumberColumn Order = new NumberColumn("Order", "3");
        public readonly TextColumn ColumnName = new TextColumn("ColName", "30");
        public readonly TextColumn Info = new TextColumn("Info", "15");
        public readonly NumberColumn Left = new NumberColumn("Lef", "5", "Left");
        public readonly NumberColumn Width = new NumberColumn("Width", "5");
        public Text GetTextFromRow(string s)
        {
            return ENV.UserMethods.Instance.Mid(s, Left, Width);
        }
        public void SetColumnBasedOn(string stringFromFile,Dictionary<int,ColumnBase> columnsMap)
        {
            var col = columnsMap[ID];
            col.Value = col.Parse(GetTextFromRow(stringFromFile), col.Format);

        }

        public ImportHelperEntity(IEntityDataProvider mdb) : base("helper", mdb)
        { }
    }

    public void ReadLine(string stringFromLine)
    {
        var ih = new ImportHelperEntity(mdb);
        ih.ForEachRow(() => ih.SetColumnBasedOn(stringFromLine,_columnsMap));
    }

    public  void ShowSettingsScreen(string stringFromFile)
    {
        var ih = new ImportHelperEntity(mdb); 
        var eb = new ENV.Utilities.EntityBrowser(ih, true);

        var right = new NumberColumn("Right", "5");
        right.BindValue(() => ih.Left + ih.Width);
        right.ValueChanged += e =>
        {
            if (e.ChangedByUser)
                ih.Left.Value = right - ih.Width;
        };

        var parsedData = new TextColumn("Data", "32000");
        parsedData.BindValue(() => ih.GetTextFromRow(stringFromFile));


        var value = new TextColumn("Value", "32000");
        value.BindValue(() =>
        {
            try
            {

                var col = _columnsMap[ih.ID];
                ih.SetColumnBasedOn(stringFromFile,_columnsMap);
                return col.ToString();

            }
            catch (Exception exx)
            {
                return exx.Message;
            }
        });
        eb.AddColumns(ih.Order, ih.ColumnName, ih.Info, ih.Left, ih.Width, right, parsedData, value);
        eb.AddAction("Save", () => mdb.DataSet.WriteXml(_settingsFileName, System.Data.XmlWriteMode.WriteSchema), true);

        Action moveforward = () =>
        {
            var ih2 = new ImportHelperEntity(mdb);
            var left = right + 1;
            ih2.ForEachRow(ih2.Order.IsGreaterThan(ih.Order), new Sort(ih2.Order), () =>
            {
                ih2.Left.Value = left;
                left += ih2.Width + 1;
            });
        };

        eb.AddAction("Reposition Following Columns", o =>
        {
            o.SaveRowAndDo(xx =>
            {
                moveforward();
                xx.ReloadData(true);
            });
        });

        eb.Handlers.Add(new CustomCommand()
        {
            Shortcut = System.Windows.Forms.Keys.Control | System.Windows.Forms.Keys.Left,
            Precondition = CustomCommandPrecondition.LeaveControl
        }).Invokes += e => ih.Left.Value--;
        eb.Handlers.Add(new CustomCommand()
        {
            Shortcut = System.Windows.Forms.Keys.Control | System.Windows.Forms.Keys.Right,
            Precondition = CustomCommandPrecondition.LeaveControl
        }).Invokes += e => ih.Left.Value++;
        eb.Handlers.Add(new CustomCommand()
        {
            Shortcut = System.Windows.Forms.Keys.Control | System.Windows.Forms.Keys.P,
            Precondition = CustomCommandPrecondition.LeaveRow
        }).Invokes += e =>
        {
            moveforward();
            ENV.Common.Raise(Command.ReloadData);
        };
        eb.Run();
            
    }
}
```