keywords:strategy pattern

```csdiff



-internal Bool Exp_5() => _parent.Orders1.ShipCountry != "Germany";
+internal Bool Exp_5() => GetDiscountStrategy().ShouldShowDiscountColumn();

-internal Text Exp_4() => u.If(_parent.Orders1.ShipCountry == "France", "3%", "5.2CZ +$;");
+internal Text Exp_4() => GetDiscountStrategy().DiscountColumnFormat();

-internal Number Exp_3() => Order_Details.UnitPrice * Order_Details.Quantity - u.If(_parent.Orders1.ShipCountry == "France", (Order_Details.UnitPrice * Order_Details.Quantity * Order_Details.Discount / 100), u.If(_parent.Orders1.ShipCountry == "Germany", 0, Order_Details.Discount));
+internal Number Exp_3() => Order_Details.Quantity * Order_Details.UnitPrice - GetDiscountStrategy().GetDiscount(Order_Details);

+DefaultDiscountStrategy GetDiscountStrategy()
+{
+    if (_parent.Orders1.ShipCountry == "France")
+        return new PrecentDiscountStrategy();
+    else if (_parent.Orders1.ShipCountry == "Germany")
+        return new NoDiscountStrategy();
+    return new DefaultDiscountStrategy();
+}
```

`DiscountStrategy.cs`
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


<iframe width="560" height="315" src="https://www.youtube.com/embed/UoGsJ19yUcw" frameborder="0" allowfullscreen></iframe>