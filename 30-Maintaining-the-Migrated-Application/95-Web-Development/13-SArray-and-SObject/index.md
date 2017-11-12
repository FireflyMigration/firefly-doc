# SArray and SObject


In our youtube channel, we’ve shown some basic web application writing that includes angular on the client side, and c# on the server side.

Here’s a link to that playlist:

<iframe width="560" height="315" src="https://www.youtube.com/embed/KB_NmAnfhRk?list=PL1DEQjXG2xnLvtE1-vUY_O6y_LLZfJ-KR" frameborder="0" allowfullscreen></iframe>

In that video we’ve shown a class called SArray and SObject that reduces the need for poco objects to create the jsons required.

Here is the source for these classes.

**SArray.cs:**

This file includes the object model and everything required to create Json/XML/CSV. Note that it has only basic references – so it can, and should be placed in ENV.

```csdiff
using Firefly.Box;
using Firefly.Box.Data.Advanced;
using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Web;
 
using System.Xml;
 
namespace Northwind.BasicAngular.Utils
{
    public class SObject : ISerializedObject
    {
        List<Val> _value = new List<Val>();
        public string ObjectType = "Object";
        public void Set(params ColumnBase[] cols)
        {
            foreach (var c in cols)
            {
                Set(c.Name, c.Value);
            }
 
        }
        public void Set(string name, object value)
        {
            Text txt;
            Number n;
            Date d;
            Time t;
            Bool b;
            if (Text.TryCast(value, out txt))
            {
 
                value = (txt ?? "").TrimEnd().ToString();
            }
            else if (Number.TryCast(value, out n))
            {
                var dec = n.ToDecimal();
                var lng = (long)dec;
                if (dec != lng)
                    value = dec;
                else value = lng;
 
            }
            else if (Date.TryCast(value, out d))
            {
                if (d == Date.Empty)
                    value = null;
                else
                {
                    value = d.ToString("YYYY-MM-DD");
                }
            }
            else if (Time.TryCast(value, out t))
            {
                value = t.ToString("HH:MM:SS");
            }
            else if (Bool.TryCast(value, out b))
                value = b.ToBoolean();
 
            _value.Add(new Val { Name = name, Value = value });
 
 
 
        }
 
        class Val
        {
            public string Name { get; set; }
            public object Value { get; set; }
        }
 
 
        public void ToWriter(ISerializedObjectWriter writer)
        {
            writer.WriteStartObject(ObjectType);
            foreach (var item in _value)
            {
                writer.WriteName(item.Name);
                var v = item.Value as ISerializedObject;
                if (v != null)
                    writer.WriteIserializedObject(v);
                else
                    writer.WriteValue(item.Value);
            }
            writer.WriteEndObject();
        }
 
        internal object Get(object name)
        {
 
            foreach (var item in _value)
            {
                if (item.Name == name)
                    return item.Value;
            }
            return null;
        }
    }
    public interface ISerializedObject
    {
        void ToWriter(ISerializedObjectWriter writer);
    }
    public interface ISerializedObjectWriter
    {
        void WriteStartArray();
        void WriteName(string name);
        void WriteValue(object value);
        void WriteIserializedObject(ISerializedObject value);
        void WriteEndArray();
        void WriteStartObject(string type);
        void WriteEndObject();
 
    }
    public class XmlISerializedObjectWriter : ISerializedObjectWriter
    {
        XmlTextWriter _writer;
        public XmlISerializedObjectWriter(XmlTextWriter writer)
        {
            _writer = writer;
        }
        public void WriteEndArray()
        {
 
        }
 
        public void WriteEndObject()
        {
            _writer.WriteEndElement();
        }
 
        public void WriteIserializedObject(ISerializedObject value)
        {
            value.ToWriter(this);
            _writer.WriteEndElement();
        }
 
        public void WriteName(string name)
        {
            _writer.WriteStartElement(name);
        }
 
        public void WriteStartArray()
        {
        }
 
        public void WriteStartObject(string type)
        {
            _writer.WriteStartElement(type);
        }
 
        public void WriteValue(object value)
        {
            _writer.WriteString(value.ToString());
            _writer.WriteEndElement();
        }
    }
    public class JsonISerializedObjectWriter : ISerializedObjectWriter
    {
        TextWriter _writer;
        public JsonISerializedObjectWriter(TextWriter writer)
        {
            _writer = writer;
        }
        public void WriteEndArray()
        {
            _writer.Write("]");
        }
 
        public void WriteEndObject()
        {
            _writer.Write("}");
        }
        bool _firstObjectInArray = true;
        bool _firstValueInObject = true;
        public void WriteIserializedObject(ISerializedObject value)
        {
            value.ToWriter(new JsonISerializedObjectWriter(_writer));
        }
 
        public void WriteName(string name)
        {
            if (_firstValueInObject)
                _firstValueInObject = false;
            else
                _writer.Write(",");
            _writer.Write("\"" + name.Replace("\"", "\\\"") + "\":");
        }
 
        public void WriteStartArray()
        {
            _writer.Write("[");
            _firstObjectInArray = true;
        }
 
        public void WriteStartObject(string type)
        {
            _firstValueInObject = true;
            if (_firstObjectInArray)
                _firstObjectInArray = false;
            else
                _writer.Write(",");
            _writer.Write("{");
        }
 
        public void WriteValue(object value)
        {
            if (value is int || value is double || value is decimal||value is long)
                _writer.Write(value.ToString());
            else
                _writer.Write("\"" + value.ToString().Replace("\\", "\\\\").Replace("\"", "\\\"").Replace("\n", "\\n").Replace("\r", "\\r") + "\"");
        }
    }
 
 
    public class CSVISerializedObjectWriter : ISerializedObjectWriter
    {
        TextWriter _writer;
        public CSVISerializedObjectWriter(TextWriter writer)
        {
            _writer = writer;
        }
        public void WriteEndArray()
        {
 
        }
 
        public void WriteEndObject()
        {
            if (_firstLine)
            {
                _writer.WriteLine(_titleLine);
                _firstLine = false;
            }
            _writer.WriteLine(_dataLine);
        }
        public void WriteIserializedObject(ISerializedObject value)
        {
            if (!_inValue)
                value.ToWriter(this);
            else
            {
                using (var sw = new StringWriter())
                {
                    value.ToWriter(new CSVISerializedObjectWriter(sw));
                    WriteValue(sw.ToString());
                }
            }
            //value.ToWriter(new CSVISerializedObjectWriter(_writer));
        }
        bool _firstLine = true;
 
        string _titleLine = "";
        string _dataLine = "";
        bool _inValue = false;
        public void WriteName(string name)
        {
            if (_titleLine.Length > 0)
                _titleLine += ",";
            _titleLine += name;
            _inValue = true;
        }
 
        public void WriteStartArray()
        {
        }
 
        public void WriteStartObject(string type)
        {
            _dataLine = "";
        }
 
        public void WriteValue(object value)
        {
            if (_dataLine.Length > 0)
                _dataLine += ",";
            var val = value.ToString();
            if (val.Contains(",") || val.Contains("\r\n"))
                val = "\"" + val.ToString().Replace("\"", "\"\"") + "\"";
            _dataLine += val;
            _inValue = false;
        }
    }
    public class SArray : ISerializedObject
    {
        List<SObject> _list = new List<SObject>();
 
        public SObject AddObject()
        {
            var r = new SObject();
            _list.Add(r);
            return r;
        }
 
        public string ToJson()
        {
            using (var sw = new StringWriter())
            {
                ToWriter(new JsonISerializedObjectWriter(sw));
                return sw.ToString();
            }
        }
 
 
        public void ToWriter(ISerializedObjectWriter writer)
        {
            writer.WriteStartArray();
            foreach (var item in _list)
            {
                item.ToWriter(writer);
            }
            writer.WriteEndArray();
        }
 
        public string ToXml()
        {
            using (var sw = new StringWriter())
            {
                ToWriter(new XmlISerializedObjectWriter(new XmlTextWriter(sw)));
                return sw.ToString();
            }
        }
        public string ToCsv()
        {
 
            using (var sw = new StringWriter())
            {
                ToWriter(new CSVISerializedObjectWriter(sw));
                return sw.ToString();
            }
        }
 
        internal void SortBy(string name)
        {
            _list.Sort((a, b) =>
            {
                return Firefly.Box.Advanced.Comparer.Compare(a.Get(name), b.Get(name));
            });
        }
        
    }
 
}
```

**SArrayResult.cs**

This file contains the definition of an MVC Action result that matches the SArray and SObject, and also the extension method required to use the “ToResult()” method.

It should be placed in a project with references to System.Web.MVC.

```csdiff
using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Web;
 
namespace Northwind.BasicAngular.Utils
{
 
    public static class SObjectHelper
    {
 
        public static SObjectResult ToResult(this ISerializedObject r)
        {
            return new SObjectResult(r);
        }
    }
 
    public class SObjectResult : System.Web.Mvc.ActionResult
    {
        ISerializedObject _r;
        public SObjectResult(ISerializedObject r)
        {
            _r = r;
        }
 
 
 
        public override void ExecuteResult(System.Web.Mvc.ControllerContext context)
        {
 
 
 
            HttpResponseBase response = context.HttpContext.Response;
            response.ContentType = "application/json";
 
            using (var sw = new StringWriter())
            {
                _r.ToWriter(new JsonISerializedObjectWriter(sw));
                response.Write(sw.ToString());
            }
 
 
        }
    }
}
```