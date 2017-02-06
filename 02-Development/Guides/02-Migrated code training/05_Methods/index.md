# Methods

Step 1 : Create ValidateOrderDate Method
```csdiff
protected override void OnSavingRow()
{
-   if (u.Year( Orders.OrderDate) < 1990 || Orders.OrderDate.Year>2020)
-   {
-       Message.ShowError("Invalid Year");
-   }
+   ValidateOrderDate();
    if (!Relations[Shippers].RowFound)
    {
        Message.ShowError("Please enter a valid shipper");
    }
}

+void ValidateOrderDate()
+{
+   if (u.Year(Orders.OrderDate) < 1990 || Orders.OrderDate.Year > 2020)
+   {
+       Message.ShowError("Invalid Year");
+    }
+}

```

Step 2 :  Create ValidateShipperId Method
```csdiff
protected override void OnSavingRow()
{
    ValidateOrderDate();
+   ValidateShipperId();
+}

+void ValidateShipperId()
+{
    if (!Relations[Shippers].RowFound)
    {
        Message.ShowError("Please enter a valid shipper");
    }
}

void ValidateOrderDate()
{
    if (u.Year(Orders.OrderDate) < 1990 || Orders.OrderDate.Year > 2020)
    {
        Message.ShowError("Invalid Year");
    }
}
```


---
<iframe width="560" height="315" src="https://www.youtube.com/embed/GRyRO3fX_do?list=PL1DEQjXG2xnK0hrpTQpa2p8ZvEMPsvh7n" frameborder="0" allowfullscreen></iframe>

