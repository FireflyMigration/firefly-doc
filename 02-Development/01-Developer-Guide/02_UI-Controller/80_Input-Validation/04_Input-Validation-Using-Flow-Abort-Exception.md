In this page we'll:
* Use the `FlowAbortException` to prevent the user from leaving the Controller
```csdiff
protected override void OnSavingRow()
{
    if (Orders.OrderDate.Year < 1990)
    {
        System.Windows.Forms.MessageBox.Show("Invalid Year");
+       throw new Firefly.Box.Advanced.FlowAbortException();
    }
}
```
* Use `ENV.Message.ShowError` to show a message and throw the exception in one line
```csdiff
protected override void OnSavingRow()
{
    if (Orders.OrderDate.Year < 1990)
    {
-       System.Windows.Forms.MessageBox.Show("Invalid Year");
-       throw new Firefly.Box.Advanced.FlowAbortException();
+       Message.ShowError("Invalid Year");
    }
}
```

* Explain how to determine if Visual Studio should switch to the code when this exception happens

---
<iframe width="560" height="315" src="https://www.youtube.com/embed/23jvCXomfQs?list=PL1DEQjXG2xnL1VKb5GvdDwxJeym7Uj6S3" frameborder="0" allowfullscreen></iframe>