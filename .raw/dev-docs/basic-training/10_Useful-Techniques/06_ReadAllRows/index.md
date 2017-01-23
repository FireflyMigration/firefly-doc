### ReadAllRows
1.	Using a button call to the `ReadAllRows` method as follows:
```
internal void ExportData()
{
    using (var writer = new System.IO.StreamWriter(@"C:\temp\exportedData.txt"))
    {
        ReadAllRows(() =>
        {
            foreach (var c in Columns)
            {
                writer.Write(c + "\t");
            }
            writer.Write("\r\n");
        });
    }
    System.Windows.Forms.MessageBox.Show("Done");
}
```
2.	Exercise: ReadAllRows