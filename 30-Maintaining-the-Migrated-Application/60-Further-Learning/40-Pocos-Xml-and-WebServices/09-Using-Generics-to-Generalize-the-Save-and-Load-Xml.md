```csdiff
public ObjectType ReadXml<ObjectType>(string fileName)
{
    using (var sw = new StreamReader(ENV.PathDecoder.DecodePath(fileName)))
    {
        return (ObjectType)new XmlSerializer(typeof(ObjectType)).Deserialize(sw);
    }
}

public void SaveXml<ObjectType>(ObjectType o, string fileName)
{
    using (var sw = new StreamWriter(ENV.PathDecoder.DecodePath(fileName)))
    {
        new XmlSerializer(typeof(ObjectType)).Serialize(sw, o);
    }
}
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/4tTUv4lPYnw?list=PL1DEQjXG2xnIpyKeZmM66PL2bbuUyhyNE" frameborder="0" allowfullscreen></iframe>