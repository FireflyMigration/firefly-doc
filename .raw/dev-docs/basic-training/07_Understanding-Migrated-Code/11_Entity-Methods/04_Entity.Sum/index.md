### Entity.Sum

1.	Let's use the entity Sum method to sum the number of items in the order:

```diff
private void btnNumberOfItems_Click(object sender, ButtonClickEventArgs e)
{
    var orderDetails = new Models.OrderDetails();
    MessageBox.Show("Number Of Items : " + 
        orderDetails.Sum(orderDetails.Quantity, orderDetails.OrderID.IsEqualTo(_controller.Orders.OrderID)));             
}
```