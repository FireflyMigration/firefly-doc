### Basic Unit Testing

1. Create a new BusinessProcess named “CustomersCSV” :
```diff
namespace Northwind.Training
{
    public class CustomersCSV : BusinessProcessBase
    {
+        public readonly Models.Customers Customers = new Models.Customers();
+        ENV.IO.FileWriter _fw; 

        public CustomersCSV()
        {
+            From = Customers;
        }
+       protected override void OnLoad()
+        {
+            _fw= new ENV.IO.FileWriter(@"%OUTPUT%customers.csv");
+            Streams.Add(_fw);
+        }
 
+       protected override void OnLeaveRow()
+        {
+            _fw.WriteLine(Customers.CustomerID.Trim());
+        }
        public void Run()
        {
            Execute();
        }
    }
}
```
2. Build it 
3. For test it, we put it on the Application.cs
```diff
protected override void OnStart()
{
    new Training.CustomersCSV().Run();
    Exit(() => true);
}
```
4.Open the file customer.csv
5.Add other fields in the .csv:
```diff
       protected override void OnLeaveRow()
        {
-            _fw.WriteLine(Customers.CustomerID.Trim());
+            _fw.WriteLine(Customers.CustomerID.Trim()+","+Customers.CompanyName); 
        }
```