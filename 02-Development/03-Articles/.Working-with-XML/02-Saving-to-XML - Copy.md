Keywords: write xml, writing xml

Add using statements
```csdiff
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
+using System.IO;
+using System.Xml.Serialization;

namespace Northwind.Training.PocosAndXml
{
    class Demo
    { 
...    
```
Create `SaveXml` Method
```csdiff
public void SaveXml(OrderPoco o, string fileName)
{
    using (var sw = new StreamWriter(fileName))
    {
        new XmlSerializer(typeof(OrderPoco)).Serialize(sw, o);
    }
}
```

Using the `SaveXml` Method
```csdiff
public void Run()
{
    var o = new OrderPoco
    {
        OrderID = 1,
        CustomerID = "ABCDE",
        Shipper = 5
    };
+   SaveXml(o, @"c:\temp\orders.xml");
}
```