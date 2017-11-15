
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

<iframe width="560" height="315" src="https://www.youtube.com/embed/XaZeNLnXtcQ?list=PL1DEQjXG2xnIpyKeZmM66PL2bbuUyhyNE" frameborder="0" allowfullscreen></iframe>