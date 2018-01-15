keywords: Invoke, Invke WebS, Web service

![Invoke W S](InvokeWS.png)

### Migrated Code Examples:


```csdiff
var wsResult = new ATPITest.Shared.WebServices.CalculatorWS().Run("Add", XML_toSend, XML_Result);
Fault.Value = Fault.FromString(wsResult.ErrorText);
```

More about consuming Web service see
[Consuming web services](consuming-a-webservice.html)
