* Load the file into a string
```csdiff
+string s = System.IO.File.ReadAllText(@"c:\temp\order.json");
```
* Convert the JSON string to the OrderPoco
```csdiff
var s = System.IO.File.ReadAllText(@"c:\temp\order.json");
+var o = JsonConvert.DeserializeObject<OrderPoco>(s);
```
* Use the existing `UpdateOrder` method to update the database based on the object we've just read from JSON
```csdiff
var s = System.IO.File.ReadAllText(@"c:\temp\order.json");
var o = JsonConvert.DeserializeObject<OrderPoco>(s);
+Demo.UpdateOrder(o);
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/2BiW-ogrj1Q?list=PL1DEQjXG2xnIpyKeZmM66PL2bbuUyhyNE" frameborder="0" allowfullscreen></iframe>