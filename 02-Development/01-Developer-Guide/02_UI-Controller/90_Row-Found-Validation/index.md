keywords:relation,link
# Row Found Validation - Check if a Relation succeeded

```csdiff
protected override void OnSavingRow()
{
    if (u.Year( Orders.OrderDate) < 1990 || Orders.OrderDate.Year>2020)
    {
        Message.ShowError("Invalid Year");
    }
+   if (!Relations[Shippers].RowFound)
+   {
+       Message.ShowError("Please enter a valid shipper");
+   }
}
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/bZjpNK5k0VI?list=PL1DEQjXG2xnL1VKb5GvdDwxJeym7Uj6S3" frameborder="0" allowfullscreen></iframe>