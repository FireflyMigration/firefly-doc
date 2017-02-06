# More about the message class  

```csdiff
protected override void OnSavingRow()
{
    if (Orders.OrderDate.Year < 1990)
    {
-        System.Windows.Forms.MessageBox.Show("Invalid Year");
-        throw new Firefly.Box.Advanced.FlowAbortException();
+        Message.ShowError("Invalid Year");
    }
}
```

---
<iframe width="560" height="315" src="https://www.youtube.com/embed/ogUjXIBsygI?list=PL1DEQjXG2xnL1VKb5GvdDwxJeym7Uj6S3" frameborder="0" allowfullscreen></iframe>

