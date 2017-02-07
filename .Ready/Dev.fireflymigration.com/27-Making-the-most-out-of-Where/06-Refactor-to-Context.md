# Refactor to Context

Great, so we have the function, but how will we find it once we need it. This being a static function, somewhere in my code will make it very difficult to find when I need it.  
Usually when I write a filter, I select my column, then press the dot key, and select the “IsEqualTo” method or the “IsGreaterThen” method. I would like to be able to select the “IsIn” method that we just created as well.

No problem, let’s add it to the “TextColumn” class in ENV – so that any time we use a text column, this method will be available to us.
```csdiff
namespace ENV.Data
{
    public class TextColumn : Firefly.Box.Data.TextColumn, 
                                         IReadOnly, IENVColumn
    {
.......
        public FilterCollection IsIn(params Text[] vals)
        {
            var where = new FilterCollection();
            var args = new ArrayList();
            args.Add(this);
            int i = 1;
            string inStatement = "{0} in (";

            foreach (var val in vals)
            {
                if (i &gt; 1)
                    inStatement += ",";
                inStatement += "{" + i++ + "}";
                args.Add(val);
            }
            inStatement += ")";

            where.Add(inStatement, args.ToArray());
            return where;
        }
.......
    }
}
```
Note that this method is no longer static, and no longer receives the TextColumn parameter called “col”. Instead it uses the “this” operator – referring to the current instance of TextColumn.

So now instead of writing:
```csdiff 
return o.CountRows(IsIn(o.CustomerID, "TOMSP", "HANAR","RICSU"));
```
We can write:
```csdiff
return o.CountRows(o.CustomerID.IsIn("TOMSP", "HANAR", "RICSU"));
```
To better understand all the different aspects of the “Where” I recommend that you have a look at the following topics in our documentation:

---
* Where – [P_Firefly_Box_BusinessProcess_Where.htm](http://www.fireflymigration.com/reference/html/P_Firefly_Box_BusinessProcess_Where.htm)  
* ICustomFilterMember Interface – [T_Firefly_Box_Data_Advanced_ICustomFilterMember.htm](http://www.fireflymigration.com/reference/html/T_Firefly_Box_Data_Advanced_ICustomFilterMember.htm)  
---
Also have a look at the “UserDbMethods”  class in “ENV”
