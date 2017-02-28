keywords:interface,abstract factory
Since each project in a large application can only see the controllers within it, and can't see controllers in other projects of the same application, how can we call them?
This article explains how this problem is solved using the "AbstractFactory" pattern.

---
<iframe width="560" height="315" src="https://www.youtube.com/embed/YRW09f3cijc?list=PL1DEQjXG2xnJzHc7zzs7CxZX0uK_oOWOY" frameborder="0" allowfullscreen></iframe>

---
### The Problem
* In the Northwind application we have 3 projects (Northwind.Products, Northwind.Customers, and Northwind.Orders)
* In the Northwind.Orders project, we added a new Controller called `CustomerOrders` which displays all the orders of a specific customer

```csdiff
namespace Northwind.Orders
{
    public class CustomerOrders : UIControllerBase
    {
    ...
        public void Run(Text customerId)
        {
            Where.Add(Orders.CustomerID.IsEqualTo(customerId);
            Execute();
        }
    ...
    }
}
```
* In the Northwind.Customers project we have a screen called `ShuwCustomerView` that has a button which when it's clicked we want to call the `CustomerOrders` controller that is in the Northwind.Orders project.
```csdiff
namespace Northwind.Customers.Views
{
    partial class ShowCustomersView : Northwind.Shared.Theme.Controls.CompatibleForm 
    {
        ShowCustomers _controller;
        internal ShowCustomersView(ShowCustomers controller)
        {
            _controller = controller;
            InitializeComponent();
        }
+       private void button1_Click(object sender, ButtonClickEventArgs e)
+       {
+           //we want to call the CustomerOrders from here
+       }
    }
}
```
* Since Northwind.Customers project does not reference Northwind.Orders project, we can't call it simply by writing `new Orders.CustomerOrders()` since it doesn't see it - it doesn't reference it.
### The Solution
#### Step 1, Create an interface in the NorthwindBase project
* That interface will be in the NorthwindBase project, in the Orders namespace (the same namespace of the `CustomerOrders` controller
* That interface will be called ICustomerOrders (using the standard naming convention for an interface)
* That interface will have a `Run` method that has the exact same parameters as the `Run` method of the `CustomerOrders` controller.
```csdiff
namespace Northwind.Orders
{
    public interface ICustomerOrders
    {
+       void Run(Text customerid);
    }
}
```
* Build NorthwindBase
#### Step 2, Add the interface to the definition of the actual CustomerOrders class
```csdiff
namespace Northwind.Orders
{
-   public class CustomerOrders : UIControllerBase
+   public class CustomerOrders : UIControllerBase, ICustomerOrders
    {
    ...
        public void Run(Text customerId)
        {
            Where.Add(Orders.CustomerID.IsEqualTo(customerId);
            Execute();
        }
    ...
    }
}
```
#### Step 3, in the Northwind.Customers project, call the ICustomerOrders interface using the `Create<>` method

```csdiff
namespace Northwind.Customers.Views
{
    partial class ShowCustomersView : Northwind.Shared.Theme.Controls.CompatibleForm 
    {
        ShowCustomers _controller;
        internal ShowCustomersView(ShowCustomers controller)
        {
            _controller = controller;
            InitializeComponent();
        }
        private void button1_Click(object sender, ButtonClickEventArgs e)
        {
+           Create<Orders.ICustomerOrders>().Run(_controller.Customers1.CustomerID);
        }
    }
}
```


