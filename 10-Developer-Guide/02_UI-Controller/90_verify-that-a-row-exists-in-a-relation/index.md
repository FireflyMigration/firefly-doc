keywords:relation,link,rowfound,row found, success indicator
In this article we'll
* Use the `watch` window to review the debug information of a `Relation` and examine the `RowFound` value when the row exists or not
* Use the `RowFound` property to check if a row exists in a relation
*

```csdiff
protected override void OnSavingRow()
{
+   if (!Relations[Shippers].RowFound)
+       Message.ShowError("Please enter a valid shipper");
}
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/bZjpNK5k0VI?list=PL1DEQjXG2xnL1VKb5GvdDwxJeym7Uj6S3" frameborder="0" allowfullscreen></iframe>