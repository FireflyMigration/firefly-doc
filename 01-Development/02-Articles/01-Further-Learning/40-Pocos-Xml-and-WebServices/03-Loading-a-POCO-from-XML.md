Keywords: read xml, reading xml
* Create the `ReadXml` Method
```csdiff
public OrderPoco ReadXml(string fileName)
{
    using (var sw = new StreamReader(fileName))
    {
        return (OrderPoco) new XmlSerializer(typeof(OrderPoco)).Deserialize(sw);
    }
}
```

* Using the `ReadXml` Method
```csdiff
void DemoReadXml()
{
+   var o = ReadXml(@"c:\temp\orders.xml");
}
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/a70zevpIu1g?list=PL1DEQjXG2xnIpyKeZmM66PL2bbuUyhyNE" frameborder="0" allowfullscreen></iframe>