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

<iframe width="560" height="315" src="https://www.youtube.com/embed/P-2FOkApfyE?list=PL1DEQjXG2xnIpyKeZmM66PL2bbuUyhyNE" frameborder="0" allowfullscreen></iframe>