
```csdiff
public void SaveXml(OrderPoco o, string fileName)
{
-   using (var sw = new StreamWriter(fileName))
+   using (var sw = new StreamWriter(ENV.PathDecoder.DecodePath(fileName)))
    {
        new XmlSerializer(typeof(OrderPoco)).Serialize(sw, o);
    }
}
```