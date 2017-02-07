keywords: Args, parameters   
Name in Magic: **Args / Arguments** property   
In the Migrated Code: the **parameters** are being sent to the Run() method  

***

```  
```  

Arguments are passed in the migrated code in the standard .Net way.  
For example, the following code passes OrderID as an argument to the Print_Order program:

```csdiff
new Print_Order().Run(Orders.OrderID);
```  
```  
```  
In the receiving program, the Run method receives the argument/s, for example:  

```csdiff
public void Run(NumberParameter ppi_OrderID)
{
  BindParameter(pi_OrderID, ppi_OrderID);
  Execute();
}
```

Note:  
For backward compatibility reasons, Migrated code will use parameter types such as NumberParameter, TextParameter etc, as opposed to NumberColumn, TextColumn.  
This allows the .Net code to behave like Magic, so that, like in Magic, expressions can be passed as parameters too.  

For more information about the Parameter Types see:
[Migrated Style Parameters](Migrated-Style-Parameters.html)
