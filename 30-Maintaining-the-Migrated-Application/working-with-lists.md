Keywords:enumerator,enumerable,list

In this video we'll use a .NET List and eventually use it as the "From" of a business Process

<iframe width="560" height="315" src="https://www.youtube.com/embed/SZvhZ1M3I2Q" frameborder="0" allowfullscreen></iframe>

```csdiff
public class DemoWorkWithListBP : BusinessProcessBase
{
    public readonly Models.Products Products = new Models.Products();

    public DemoWorkWithListBP()
    {
        Relations.Add(Products,
          Products.ProductID.IsEqualTo(
+           () => enumerator.Current.ProductID));
    }
    protected override void OnLeaveRow()
    {
        MessageBox.Show(
$@"Id: {enumerator.Current.ProductID}
Name: {Products.ProductName}
Current Quantity: {Products.UnitsInStock}
New Quantity: {enumerator.Current.UnitsInStockCount}");

+       if (!enumerator.MoveNext())
+           Exit();
    }
+   List<StockInfo>.Enumerator enumerator;
    public void Run()
    {
+       enumerator = StockInfo.CreateTestData().GetEnumerator();
+       if (!enumerator.MoveNext()) return;

        Execute();
    }
}
```
