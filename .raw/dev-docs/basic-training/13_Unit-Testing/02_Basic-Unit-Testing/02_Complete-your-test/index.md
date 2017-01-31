# Using your test for develop your code

1. Let's start to modify the code CustomersCSV.cs
```csdiff
protected override void OnLoad()
{ 
    _fw = new ENV.IO.FileWriter(@"%OUTPUT%customers.csv");
    Streams.Add(_fw);
}

protected override void OnLeaveRow()
{
+   var cw = new CSVWriter();
+   cw.Add(Customers.CustomerID);
+   cw.Add(Customers.CompanyName);
-   _fw.WriteLine(Customers.CustomerID.Trim()+","+Customers.CompanyName);
+   _fw.WriteLine(cw.ToString());
}
```
2. Run it and go back to your Output directory
3. Add some columns in the csv 
```csdiff
protected override void OnLeaveRow()
{
    var cw = new CSVWriter();
    cw.Add(Customers.CustomerID);
    cw.Add(Customers.CompanyName);
+   cw.Add(Customers.Phone);
+   cw.Add(Customers.PostalCode);
    _fw.WriteLine(cw.ToString());
}
```
4. Build and run it
5. So far so good, let's says that we want to first of all have it `Trim()`
6. So we are creating a test, to verify that we are trimming correctly.
```csdiff
[TestMethod]
public void BasicTest2()
{
    var cw = new Northwind.CSVWriter();
    cw.Add("Virginie   ");
    cw.Add("   Ron");
    cw.ToString().ShouldBe("Virginie,Ron");
}
```
7. Run it and test again
8. You can see that it is failed
9. Add `trim()` method on CSVWriter
```csdiff
public void Add(string v)
{
    if (_result.Length > 0)
        _result += ",";   
-   _result += v ;
+   _result += v.Trim() ;
}
``` 
10. Run the test again, it passed
11. Run the application and check the file csv

#### Testing all types

```csdiff
[TestMethod]
public void BasicTest_supportForAllTypes()
{
    var cw = new Northwind.CSVWriter();
    cw.Add("Virginie   ");
    cw.Add(7);
    cw.Add("   Ron");
    cw.ToString().ShouldBe("Virginie,7,Ron");
}
```
1. when you tested it, you received a error `Argument 1: cannot convert from 'int' to 'string'.` because the Add() function receive a string as parameter.
```csdiff
- public void Add(string v)
+ public void Add(object v)
{
    if (_result.Length > 0)
        _result += ",";   
+   var val = v.ToString();
-    _result += v.Trim() ;
+    _result += val.Trim() ;
}
```
2. Run the test, and it passed

#### Testing null value
```csdiff
[TestMethod]
public void BasicTest_testNulls()
{
    var cw = new Northwind.CSVWriter();
    cw.Add("Virginie   ");
    cw.Add(null);
    cw.Add("   Ron");
    cw.ToString().ShouldBe("Virginie,null,Ron");
}
```
1. when you tested it, you received a error `Object reference not set to an instance of an object.`
2. we can fix this 
```csdiff
public void Add(object v)
{
    if (_result.Length > 0)
        _result += ",";   
-   var val = v.ToString();
+   var val = (v??"null").ToString();
   _result += val.Trim() ;
}
```
3. Run the test, and it passed

#### Testing comma in value
```csdiff
[TestMethod]
public void TestCommaInValue()
{
    var cw = new Northwind.CSVWriter();
    cw.Add("Virginie,Lellouche");
    cw.Add("Ron");
    cw.ToString().ShouldBe("\"Virginie,Lellouche\",Ron");
}
```
1. when you tested it, you received a error
```
The expected - "Virginie,Lellouche",Ron
The actual   - Virginie,Lellouche,Ron
```

2. modify CSVwriter
```csdiff
public void Add(object v)
{
    if (_result.Length > 0)
        _result += ",";
-   var val = (v??"null").ToString();
+   var val = (v??"null").ToString().Trim();
+   if (val.Contains(','))
+       val = "\"" + val + "\"";
-   _result += val.Trim() ;
+   _result += val ;
}
```
3. Run the test, and it passed

#### Testing Comma and quotes in value
```csdiff
[TestMethod]
public void TestCommaAndQuotesInValue()
{
    var cw = new Northwind.CSVWriter();
    cw.Add("Virginie (\"Test\"),Lellouche");
    cw.Add("Ron");
    cw.ToString().ShouldBe("\"Virginie (\"\"Test\"\"),Lellouche\",Ron");
}
```
1. when you tested it, you received a error
```
The expected - "Virginie (""Test""),Lellouche",Ron
The actual   - "Virginie ("Test"),Lellouche",Ron
```
2. modify CSVwriter
```csdiff
public void Add(object v)
{
    if (_result.Length > 0)
        _result += ",";
    var val = (v??"null").ToString().Trim();
    if (val.Contains(','))
-        val = "\"" + val + "\"";
+        val = "\"" + val.Replace("\"","\"\"") + "\"";
    _result += val;
}
```
3. Run the test, and it passed

### Test index column in the file
```csdiff
public void TestUsingIndexer()
{
    var cw = new Northwind.CSVWriter();
    cw.Add("Virginie");
    cw[4] = "Ron";
    cw[2] = "Test";
    cw.ToString().ShouldBe("Virginie,,Test,,Ron");
}
```
1. when you tested it, you received a error `Cannot apply indexing with [] to an expression of type 'CSVWriter'`
2. we can fix this, in c# an index is a kind of property 

```
public class CSVWriter
    {
+       List<object> _items = new List<object>();
-        string _result = "";
        public void Add(object v)
        {
+           _items.Add(v);

        }
+       public object this[int index]
+       {
+            set
+            {
+                while (index >= _items.Count)
+                    _items.Add("");
+                _items[index] = value;
+            }
+       }

        public override string ToString()
        {
-           return _result;
+           foreach (var v in _items)
+            {
+               string result = "";
+                if (result.Length > 0)
+                    result += ",";
+               var val = (v ?? "null").ToString().Trim();
+               if (val.Contains(','))
+                    val = "\"" + val.Replace("\"", "\"\"") + "\"";
+               result += val;
+               return result;
+            }
        }

```
3. Run the test, and it passed
4. this code uses `string result = "";` and `+=` (`result += ",";`), we recommend to use string builder
```csdiff
public override string ToString()
{
-   string result = "";
+   var result = new StringBuilder();
    foreach (var v in _items)
    {
        if (result.Length > 0)
-           result += ",";
+           result.Append( ",");
        var val = (v ?? "null").ToString().Trim();
        if (val.Contains(','))
            val = "\"" + val.Replace("\"", "\"\"") + "\"";
-       result += val;
+       result.Append(val)
    }
           
-   return result;
+   return result.ToString();

}
```
5. So now, before you write a new code, you think about what you want to write, what do you need to test, you write the test and then you write the code implement
