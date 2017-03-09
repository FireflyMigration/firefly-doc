Keywords: read xml, reading xml
`ReadXml` Method
```csdiff
public OrderPoco ReadXml(string fileName)
{
    using (var sw = new StreamReader(fileName))
    {
        return (OrderPoco) new XmlSerializer(typeof(OrderPoco)).Deserialize(sw);
    }
}
```

Using the `ReadXml` Method
```csdiff
void DemoReadXml()
{
+   var o = ReadXml(@"c:\temp\orders.xml");
}
```