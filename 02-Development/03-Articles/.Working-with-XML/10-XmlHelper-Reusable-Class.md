```csdiff
using System.IO;
using System.Xml.Serialization;

namespace Northwind.Shared
{
    public class XMLHelper
    {
        public static ObjectType ReadXml<ObjectType>(string fileName)
        {
            using (var sw = new StreamReader(ENV.PathDecoder.DecodePath(fileName)))
            {
                return (ObjectType)new XmlSerializer(typeof(ObjectType)).Deserialize(sw);
            }
        }

        public static void SaveXml<ObjectType>(ObjectType o, string fileName)
        {
            using (var sw = new StreamWriter(ENV.PathDecoder.DecodePath(fileName)))
            {
                new XmlSerializer(typeof(ObjectType)).Serialize(sw, o);
            }
        }
        public static ObjectType ReadXmlString<ObjectType>(string xmlString)
        {
            using (var sw = new StringReader(xmlString))
            {
                return (ObjectType)new XmlSerializer(typeof(ObjectType)).Deserialize(sw);
            }
        }

        public static string SaveXmlString<ObjectType>(ObjectType o)
        {
            using (var sw = new StringWriter())
            {
                new XmlSerializer(typeof(ObjectType)).Serialize(sw, o);
                return sw.ToString();
            }
        }
    }
}

```