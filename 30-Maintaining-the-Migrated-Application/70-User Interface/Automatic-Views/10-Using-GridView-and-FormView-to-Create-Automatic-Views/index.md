
Use `GridView` and `FormView` to create automatic views without any need for the visual designer

<iframe width="560" height="315" src="https://www.youtube.com/embed/VYfzhbYn4CQ" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>


#### Use Grid View
```csdiff
protected override void OnLoad()
{
-   View = () => new Views.ShowProductsView(this);
+   View = () => new ENV.UI.GridView(Products.ProductID,Products.ProductName);
}
```

#### Use Form View
```csdiff
protected override void OnLoad()
{
-   View = () => new Views.ShowProductsView(this);
+   View = () => new ENV.UI.FormView(Products.ProductID,Products.ProductName);
}
```

#### Add an Action to the View
```csdiff
protected override void OnLoad()
{
    View = () =>
    {
        var result = new ENV.UI.GridView(Products.ProductID, Products.ProductName, Products.SupplierID);
+       result.AddAction("Do Something", () =>
+       {
+           System.Windows.Forms.MessageBox.Show("Test");
+       });
        return result;
    };
}
```

#### Add a CheckBox
```csdiff
protected override void OnLoad()
{
    View = () =>
    {
        var result = new ENV.UI.GridView(Products.ProductID, Products.ProductName, Products.SupplierID);
+       result.AddCheckBox(Products.Discontinued);
        result.AddAction("Do Something", () =>
        {
            System.Windows.Forms.MessageBox.Show("Test");
        });
        return result;
    };
}
```

#### Add a ComboBox based on an Entity
```csdiff
protected override void OnLoad()
{
    View = () =>
    {
        var result = new ENV.UI.GridView(Products.ProductID, Products.ProductName);
+       var sup = new Models.Suppliers();
+       result.AddCombo(Products.SupplierID, sup, sup.SupplierID, sup.CompanyName);
        result.AddCheckBox(Products.Discontinued);
        result.AddAction("Do Something", () =>
        {
            System.Windows.Forms.MessageBox.Show("Test");
        });
        return result;
    };
}
```
## Source Code
### GridView
```csdiff
using System;
using System.Windows.Forms;
using ENV.Data;
using ENV.UI;
using ENV.Utilities;
using Firefly.Box;
using Firefly.Box.Data;
using Firefly.Box.Data.Advanced;
using Firefly.Box.UI.Advanced;

namespace ENV.UI
{
    public class GridView : ENV.UI.Form
    {
        public GridView(params ColumnBase[] columns)
        {
            Height = 430;
            
            grid = new ENV.UI.Grid
            {
                AllowMultiSelect = true,

                Width = 21,
                Height = this.ClientSize.Height,
                AllowUserToResizeColumns = true,
                AllowUserToReorderColumns = true,
                AlternatingBackColor = System.Drawing.Color.FromArgb(243, 249, 254),
                RowColorStyle = Firefly.Box.UI.GridRowColorStyle.AlternatingRowBackColor,
                UnderConstructionNewGridLook = true,
                HeaderHeight = 30,
                
            };
            RightToLeft = LocalizationInfo.Current.RightToLeft;
            RightToLeftLayout = true;
            AutoScroll = true;
            StartPosition = Firefly.Box.UI.WindowStartPosition.CenterMDI;
            PaintChildControls = true;
            Controls.Add(grid);
            ContextMenuStrip = _strip;
            AddColumns(columns);
        }
        public void AddCheckBox(Data.BoolColumn column)
        {
            var cb = new CheckBox();
            cb.Data = column;
            cb.UseColumnInputRangeWhenEmptyText = false;
            AddGridColumn(column.Caption, cb);
        }
        ContextMenuStrip _strip = new ContextMenuStrip() { };
        public int MaxWidthINChars = 25;
        protected override void OnLoad(EventArgs e)
        {
            grid.EnableGridEnhancements();
            if (RightToLeft == RightToLeft.Yes)
                grid.AdvancedAnchor = new Firefly.Box.UI.AdvancedAnchor(100, 0, 0, 100);
            else
                grid.AdvancedAnchor = new Firefly.Box.UI.AdvancedAnchor(0, 0, 0, 100);
            var originalGridWidth = grid.Width;
            Resize += (sender, args) => grid.Width = Math.Min(originalGridWidth, ClientSize.Width);
            Layout += delegate { grid.Height = ClientSize.Height - (HorizontalScroll.Visible ? SystemInformation.HorizontalScrollBarHeight : 0); };
            base.OnLoad(e);
        }
        public new System.Windows.Forms.RightToLeft RightToLeft
        {
            get { return base.RightToLeft; }
            set
            {
                base.RightToLeft = value;
                grid.RightToLeft = value;
            }
        }
        public bool RightToLeftByFormat { get; set; }
        private Firefly.Box.UI.Advanced.ControlBase GetControl(ColumnBase column)
        {


            {
                Firefly.Box.UI.Advanced.InputControlBase icb = null;
                icb = GetControlBasedOnControlTypeInColumn(column, c => c.ControlTypeOnGrid);
                var tb = icb as ENV.UI.TextBox;
                if (icb == null)
                {
                    tb = new ENV.UI.TextBox
                    {
                        Data = column,
                        RightToLeft = RightToLeft,
                        Style = Firefly.Box.UI.ControlStyle.Flat,
                        AdvancedAnchor = new Firefly.Box.UI.AdvancedAnchor(0, 100, 0, 0),
                        RightToLeftByFormat = RightToLeftByFormat,
                        ShowExpandButton = true
                    };
                    icb = tb;
                }



                var x = column.FormatInfo.MaxLength;
                if (column is DateTimeColumn)
                    x = 15;
                if (x == 0)
                    x = MaxWidthINChars;
                if (x >= MaxWidthINChars)

                    x = MaxWidthINChars;
                if (tb != null)
                {
                    tb.ResizeToFit(x);

                    
                }
                return icb;
            }
        }

        internal static Firefly.Box.UI.Advanced.InputControlBase GetControlBasedOnControlTypeInColumn(ColumnBase column, Func<IENVColumn, System.Type> getControlType)
        {
            Firefly.Box.UI.Advanced.InputControlBase icb = null;
            var envColumn = column as IENVColumn;
            if (envColumn != null)
            {
                var controlType = getControlType(envColumn);
                if (controlType != null)
                {
                    try
                    {
                        icb = Activator.CreateInstance(controlType) as Firefly.Box.UI.Advanced.InputControlBase;
                        if (icb != null)
                        {
                            var d = icb.GetType().GetProperty("Data");

                            d.SetValue(icb, Activator.CreateInstance(d.PropertyType, column), new object[0]);

                        }
                    }
                    catch { }
                }
            }

            return icb;
        }

        public void AddAction(string what, Action action, Func<bool> condition = null)
        {

            var b = new ToolStripMenuItem() { Text = what };
            b.Click += delegate
            {
                try
                {
                    Common.RunOnLogicContext(this, action);
                }
                catch (Exception ex)
                {
                    ENV.Common.ShowExceptionDialog(ex, true, what);

                }

            };
            if (condition != null)
                _strip.Opening += (s, e) =>

                {
                    b.Visible = condition();

                };

            _strip.Items.Add(b);




        }
        public int MultiSelectRowsCount { get { return grid.MultiSelectRowsCount; } }



        Grid grid;


        internal void ReadSelectedRows(Action what)
        {
            grid.ReadSelectedRows(what);
        }

        internal FilterOnAllColumnsClass GetFilterOnAllColumnsClass()
        {
            return new FilterOnAllColumnsClass(grid);
        }

        public void AddColumns(params ColumnBase[] args)
        {
            foreach (var item in args)
            {
                AddColumn(item);
            }
        }
        public void AddColumn(ColumnBase column, Action<ControlBase> doOnControl = null)
        {
            var tb = GetControl(column);
            AddGridColumn(column.Caption, tb);
            if (doOnControl != null)
                doOnControl(tb);
        }
        public void AddCombo<T>(TypedColumnBase<T> column, Data.Entity sourceEntity = null, TypedColumnBase<T> valueColumn = null, Data.TextColumn displayColumn = null, Sort orderBy = null, FilterBase where = null, string values = null, string displayValues = null)
        {
            var c = new ENV.UI.ComboBox() { Data = column, Style = Firefly.Box.UI.ControlStyle.Flat };
            if (sourceEntity != null)
            {
                c.ListSource = sourceEntity;
                c.ValueColumn = valueColumn;
                if (displayColumn != null)
                    c.DisplayColumn = displayColumn;
                else
                    c.DisplayColumn = valueColumn;
                if (where != null)
                    c.ListWhere.Add(where);
                if (orderBy != null)
                    c.ListOrderBy = orderBy;
                else
                    c.ListOrderBy.Add(valueColumn);
            }
            if (values != null)
                c.Values = values;
            if (displayValues != null)
                c.DisplayValues = displayValues;
            using (var tb = new TextBox())
            {
                var length = MaxWidthINChars;
                if (displayColumn!=null && displayColumn.FormatInfo.MaxLength > 5 && displayColumn.FormatInfo.MaxLength < MaxWidthINChars)
                    length = displayColumn.FormatInfo.MaxLength;
                tb.ResizeToFit(length);
                c.Width = tb.Width;
            }
            AddGridColumn(column.Caption, c);
        }
        public void AddGridColumn(string columnTitle, Firefly.Box.UI.Advanced.ControlBase tb)
        {
            var gc = new ENV.UI.GridColumn
            {
                Text = columnTitle,
                RightToLeft = RightToLeft,
                AllowSort = true,
                AutoResize = false,
                Name = columnTitle
            };





            gc.Controls.Add(tb);
            gc.ResizeToFitContent();
            tb.Location = new System.Drawing.Point(2, 3);
            tb.Width = gc.Width - 3;
            grid.Controls.Add(gc);
            grid.Width += gc.Width;
            if (!FitToMDI)
            {
                if (ClientSize.Width < grid.Width)
                    ClientSize = new System.Drawing.Size(grid.Width, ClientSize.Height);
            }
        }
    }
}
```
### FormView
```csdiff
using System;
using System.Collections.Generic;
using System.Drawing;
using System.Windows.Forms;
using ENV.Data;
using Firefly.Box;
using Firefly.Box.Data.Advanced;

namespace ENV.UI
{
    public class FormView : ENV.UI.Form
    {
        int padding = 5;
        int _top;
        List<ENV.UI.Label> _labels = new List<ENV.UI.Label>();
        List<System.Windows.Forms.Control> _textboxes = new List<System.Windows.Forms.Control>();
        int _labelWidth;
        int _textBoxWidth;
        int _actionsOffset = 0;
        public FormView(params ColumnBase[] columns)
        {
            StartPosition = Firefly.Box.UI.WindowStartPosition.CenterMDI;
            Width = 200;
            RightToLeftLayout = true;
            BackColor = ENV.Labs.FaceLiftDemo.BackGroundColor;
            _top = padding;
            AddColumns(columns);
        }
        public void AddAction(string name, Action what)
        {
            if (_top < 120)
                _top = 120;
            ClientSize = new Size(Math.Max(ClientSize.Width, 300), ClientSize.Height);
            var tc = new TextColumn();
            tc.DefaultValue = name;
            var b = new ENV.UI.Button { Data = tc, Top = _top, CoolEnabled = true };
            var w = b.Width;
            b.ResizeToFit(name);
            if (w > b.Width)
                b.Width = w;
            b.Left = ClientSize.Width - padding - b.Width - _actionsOffset;
            _actionsOffset += b.Width + padding;
            b.Click += delegate { what(); };

            AcceptButton = b;
            ResizeToFit(b);
            Controls.Add(b);
            if (b.Left < padding)
            {
                var y = padding - b.Left;
                foreach (var item in Controls)
                {
                    var btn = item as Button;
                    if (btn != null)
                    {
                        btn.Left += y;
                        ResizeToFit(btn);
                    }

                }
            }
        }

        public void AddCombo<T>(TypedColumnBase<T> column, Entity sourceEntity = null, TypedColumnBase<T> valueColumn = null, TextColumn displayColumn = null, Sort orderBy = null, FilterBase where = null, string values = null, string displayValues = null)
        {
            var c = new ENV.UI.ComboBox() { Data = column };
            if (sourceEntity != null)
            {
                c.ListSource = sourceEntity;
                c.ValueColumn = valueColumn;
                if (displayColumn != null)
                    c.DisplayColumn = displayColumn;
                else
                    c.DisplayColumn = valueColumn;
                if (where != null)
                    c.ListWhere.Add(where);
                if (orderBy != null)
                    c.ListOrderBy = orderBy;
                else
                    c.ListOrderBy.Add(valueColumn);
            }
            if (values != null)
                c.Values = values;
            if (displayValues != null)
                c.DisplayValues = displayValues;
            AddColumn(column.Caption, c);
        }
        public void AddCheckBox(Data.BoolColumn column)
        {
            var cb = new CheckBox();
            cb.Data = column;
            cb.UseColumnInputRangeWhenEmptyText = false;
            AddColumn(column.Caption, cb);
        }
        public void AddColumn(string name, Control displayControl)
        {

            var label = new ENV.UI.Label
            {
                Style = Firefly.Box.UI.ControlStyle.Flat,
                Width = 150,
                Left = padding,
                Top = _top,
                Text = name
            };
            label.ResizeToFitContent();
            if (label.Width <= _labelWidth)
            {
                label.Width = _labelWidth;
            }
            else
            {
                foreach (var label1 in _labels)
                {
                    label1.Width = _labelWidth;
                }
                foreach (var textBox in _textboxes)
                {
                    textBox.Left = label.Right + padding;
                }
                _labelWidth = label.Width;
            }
            _labels.Add(label);
            Controls.Add(label);
            var tb = displayControl;

            tb.Left = label.Right + padding;
            tb.Top = _top;
            if (tb.Height<label.Height)
                tb.Height = label.Height;

            if (tb.Width < _textBoxWidth)
            {
                tb.Width = _textBoxWidth;
            }
            else
            {
                foreach (var textBox in _textboxes)
                {
                    textBox.Width = tb.Width;
                }
                _textBoxWidth = tb.Width;
            }

            _textboxes.Add(tb);
            ResizeToFit(tb);
            Controls.Add(tb);

            _top = label.Bottom + padding;
        }
        public void AddColumns(params ColumnBase[] args)
        {
            foreach (var item in args)
            {
                AddColumn(item);
            }
        }
        public void AddColumn(BoolColumn column)
        {
            AddColumn(column.Caption, new Firefly.Box.UI.CheckBox { Data = column, Text = "" });
        }
        public void AddColumn(ColumnBase column)
        {
            var control = GridView.GetControlBasedOnControlTypeInColumn(column, x => x.ControlType);
            if (control == null)
            {
                var tb = new TextBox { Data = column };
                tb.ResizeToFit(Math.Max(30, Math.Min(column.FormatInfo.MaxLength, 50)));
                control = tb;
            }
            AddColumn(column.Caption, control);
        }
        public void AddPassword(TextColumn column)
        {
            var tb = new TextBox { Data = column, UseSystemPasswordChar = true };
            tb.ResizeToFit(Math.Max(30, Math.Min(column.FormatInfo.MaxLength, 50)));
            AddColumn(column.Caption, tb);
        }
        void ResizeToFit(Control c)
        {
            ClientSize = new Size(Math.Max(ClientSize.Width, c.Right + padding), c.Bottom + padding);
        }
    }
}
```