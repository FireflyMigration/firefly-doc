In this section we'll review:
* What are methods - a better way to organize code
* We'll extract the order validate logic, to the ValidateOrderDateMethod
```csdiff
protected override void OnSavingRow()
{
-   if (u.Year( Orders.OrderDate) < 1990 || Orders.OrderDate.Year>2020)
-   {
-       Message.ShowError("Invalid Year");
-   }
+   ValidateOrderDate();
}

+void ValidateOrderDate()
+{
+   if (u.Year(Orders.OrderDate) < 1990 || Orders.OrderDate.Year > 2020)
+   {
+       Message.ShowError("Invalid Year");
+   }
+}

```

* Demo how to use the "ExtractMethod" automatic refactoring from Visual Studio

<iframe width="560" height="315" src="https://www.youtube.com/embed/GRyRO3fX_do?list=PL1DEQjXG2xnK0hrpTQpa2p8ZvEMPsvh7n" frameborder="0" allowfullscreen></iframe>

