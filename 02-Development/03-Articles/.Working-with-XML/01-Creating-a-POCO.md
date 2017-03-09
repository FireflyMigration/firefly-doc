Creating the Poco

```csdiff
namespace Northwind.Training.PocosAndXml
{
+   public class OrderPoco
+   {
+       public int OrderID;
+       public string CustomerID;
+       public int Shipper;
+   }
}
```
Using the Poco
```csdiff
    class Demo
    {
        public void Run()
        {
+           var o = new OrderPoco
+           {
+               OrderID = 1,
+               CustomerID = "ABCDE",
+               Shipper = 3
+           };
        }
    }
```