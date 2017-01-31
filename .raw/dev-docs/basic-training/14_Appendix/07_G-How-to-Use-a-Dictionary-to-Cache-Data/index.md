### How to Use a Dictionary to Cache Data
1.	In the type class add a dictionary to store the cached values.  
2.	The key type should be the same as the value property type, for example a CustomerID value type is Number. 
3.	The dictionary value type should be the same as the returned value. For example the Customer Name is a Text type. 
4.	Add a public method that return the value first from the dictionary and if not exists gets it from the database and adds it to the dictionary.
5.	Here is an example of the result:
```
/// <summary>Customer ID</summary>
public class CustomerID : NumberColumn
{
    static System.Collections.Generic.Dictionary<Number, Text> _cachedNames = new System.Collections.Generic.Dictionary<Number, Text>();

    public Text GetCustomerName()
    {
        Text result;
        if (!_cachedNames.TryGetValue(this, out result))
        {   
            result = GetItFromTheDatabase(this);
            _cachedNames.Add(this, result);
        }
        return result;
    }
}
```