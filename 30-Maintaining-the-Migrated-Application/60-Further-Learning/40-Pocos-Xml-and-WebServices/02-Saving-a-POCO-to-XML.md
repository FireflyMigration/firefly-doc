Keywords: write xml, writing xml

* Add using statements
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
* Create the `SaveXml` Method
```csdiff
public void SaveXml(OrderPoco o, string fileName)
{
    using (var sw = new StreamWriter(fileName))
    {
        new XmlSerializer(typeof(OrderPoco)).Serialize(sw, o);
    }
}
```

* Using the `SaveXml` Method
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

<iframe width="560" height="315" src="https://www.youtube.com/embed/2UeIQuqwzOU?list=PL1DEQjXG2xnIpyKeZmM66PL2bbuUyhyNE" frameborder="0" allowfullscreen></iframe>