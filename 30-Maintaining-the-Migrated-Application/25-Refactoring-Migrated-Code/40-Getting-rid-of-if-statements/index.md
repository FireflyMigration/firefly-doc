keywords:strategy pattern

In our application we needed to implement a different discount algorithm for each country.
* By default - the discount was in it's $ amount.
* For orders that are shipped to France it had to be by % of line.
* For orders that are shipped to Germany there is no Discount.

Previously this was implemented by several complicated expressions with lot's of rules.

Visible Expression:
```csdiff
internal Bool Exp_5() => _parent.Orders1.ShipCountry != "Germany";
```

Format (Picture) Expression:
```csdiff
internal Text Exp_4() => u.If(_parent.Orders1.ShipCountry == "France", "3%", "5.2CZ +$;");
```

Total Expression:
```csdiff
internal Number Exp_3() => Order_Details.UnitPrice * Order_Details.Quantity - u.If(_parent.Orders1.ShipCountry == "France", (Order_Details.UnitPrice * Order_Details.Quantity * Order_Details.Discount / 100), u.If(_parent.Orders1.ShipCountry == "Germany", 0, Order_Details.Discount));
```


# After the refactoring
We refactored this into a strategy object:
```csdiff
namespace Northwind.Orders
{
    public class DefaultDiscountStrategy
    {
        public virtual bool ShouldShowDiscountColumn()
        {
            return true;
        }
        public virtual Text DiscountColumnFormat()
        {
            return "5.2CZ +$;";
        }
        public virtual Number GetDiscount(Models.Order_Details Order_Details)
        {
            return Order_Details.Discount;
        }
    }
    public class PrecentDiscountStrategy : DefaultDiscountStrategy
    {
        public override Text DiscountColumnFormat()
        {
            return "3%";
        }
        public override Number GetDiscount(Order_Details Order_Details)
        {
            return (Order_Details.UnitPrice * Order_Details.Quantity * Order_Details.Discount / 100);
        }
    }
    public class NoDiscountStrategy : DefaultDiscountStrategy
    {
        public override bool ShouldShowDiscountColumn()
        {
            return false;
        }
        public override Number GetDiscount(Order_Details Order_Details)
        {
            return 0;
        }
    }
}
```

We implemented a GetStrategy method:
```csdiff
+DefaultDiscountStrategy GetDiscountStrategy()
+{
+    if (_parent.Orders1.ShipCountry == "France")
+        return new PrecentDiscountStrategy();
+    else if (_parent.Orders1.ShipCountry == "Germany")
+        return new NoDiscountStrategy();
+    return new DefaultDiscountStrategy();
+}
```

And replaced the expressions:

Visible Expression:
```csdiff
-internal Bool Exp_5() => _parent.Orders1.ShipCountry != "Germany";
+internal Bool Exp_5() => GetDiscountStrategy().ShouldShowDiscountColumn();
```

Format (Picture) Expression:
```csdiff
-internal Text Exp_4() => u.If(_parent.Orders1.ShipCountry == "France", "3%", "5.2CZ +$;");
+internal Text Exp_4() => GetDiscountStrategy().DiscountColumnFormat();

```

Total Expression:
```csdiff
-internal Number Exp_3() => Order_Details.UnitPrice * Order_Details.Quantity - u.If(_parent.Orders1.ShipCountry == "France", (Order_Details.UnitPrice * Order_Details.Quantity * Order_Details.Discount / 100), u.If(_parent.Orders1.ShipCountry == "Germany", 0, Order_Details.Discount));
+internal Number Exp_3() => Order_Details.Quantity * Order_Details.UnitPrice - GetDiscountStrategy().GetDiscount(Order_Details);
```




<iframe width="560" height="315" src="https://www.youtube.com/embed/UoGsJ19yUcw" frameborder="0" allowfullscreen></iframe>