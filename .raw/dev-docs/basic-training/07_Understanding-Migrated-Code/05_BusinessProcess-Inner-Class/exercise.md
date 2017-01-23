### BusinessProcess Inner Class
1.	Set the "CountProducts" BusinessProcess to be an inner class of the FlowUIController "Categories".
2.	Create a variable with the type of the parent class which will be an object reference to the parent class
```diff 
class CountProducts : BusinessProcessBase
{
    public Models.Products Products = new Models.Products();
+   Categories _parent;

```
3.	Receive the object in the constructor method.
4.	Since "CountProducts" is now an inner class, the local `NumberColum` used for calculation is not necessary and also the parameters in the Run() method.
5.	You will now have two `Run()` methods. Remove the first one.
6.	Switch the CategoryID parameter of the IsEqualTo to be from the parent task
```diff
public void Run()
{   
    Where.Clear();
+   Where.Add(Products.CategoryID.IsEqualTo(_parent.Categories.CategoryID));
    Execute();
}
```
 
7.	Update the NumberOfProducts in the OnEnd() method of "CountProducts"
```diff
protected override void OnEnd()
{
+  _parent.NumberOfProducts.Value = Counter;
}
``` 
8.	Build and test.
