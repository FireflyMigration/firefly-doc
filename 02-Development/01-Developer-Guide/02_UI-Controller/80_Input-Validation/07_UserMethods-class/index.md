In this page we'll
* introduce the `ENV.UserMethods` class - used by the `u` member
* We'll show how it has any function that you knew in magic with it's source code
* We'll explain that it serves 3 roles:
  * **You're always productive** - You'll never be stuck, you can always think, *"How would I have done that in magic"* and start from there
  * You can read it's code and learn how to *"do it in .NET"*
  * New .NET Developers can learn from it the subtleties in your application (Like `Date.Empty` etc...)

```csdiff
protected override void OnSavingRow()
{
-    if (Orders.OrderDate.Year < 1990)
+    if (u.Year( Orders.OrderDate) < 1990)
    {
        Message.ShowError("Invalid Year");
    }
}
```
---
<iframe width="560" height="315" src="https://www.youtube.com/embed/GKo8FHW_X6c?list=PL1DEQjXG2xnL1VKb5GvdDwxJeym7Uj6S3" frameborder="0" allowfullscreen></iframe>

