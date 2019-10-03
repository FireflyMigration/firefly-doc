keywords:GetValue,getv snippet

Using the `getv` snippet, we can add the `GetName` method to the `CustomerID` type and remove all the relations in my code that were used to get the CompanyName

```csdiff
public class CustomerID : TextColumn 
{
    public CustomerID() : base("Customer ID", "5")
    {
        Expand += () => new ShowCustomers().Run(this);
    }
+   Models.Customers _lookupEntity;
+   public Text GetName()
+   {
+       if (_lookupEntity == null)
+           _lookupEntity = new Models.Customers();
+       return _lookupEntity.GetValue(_lookupEntity.CompanyName, _lookupEntity.CustomerID.IsEqualTo(this));
+   }
}
```


<iframe width="560" height="315" src="https://www.youtube.com/embed/s6OW_dxqt0w?list=PL1DEQjXG2xnLzvOZZ55WcSSLF8EdrBayZ" frameborder="0" allowfullscreen></iframe>

See Also:
[Types, I want more out of it !](types-i-want-more-out-of-it.html)