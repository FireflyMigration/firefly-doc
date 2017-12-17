Let's say that we don't like Mondays, and we want that the date column will display a different background for Mondays
```csdiff
  ordersGrid = new radweb.GridSettings(new models.Orders(),
    {
      numOfColumnsInGrid: 4,
      get: { limit: 4 },
      allowUpdate: true,
      onEnterRow: orders =>
        this.orderDetailsGrid.get({
          where: orderDetails =>
            orderDetails.orderID.isEqualTo(orders.id)
        }),
      rowButtons: [
        {
          click: orders =>
            window.open(
              environment.serverUrl + 'home/print/' + orders.id.value),
          cssClass: 'btn btn-primary glyphicon glyphicon-print'
        }
      ],
+     rowCssClass: orders =>
+       orders.orderDate.getDayOfWeek() == 1 ? "danger" : "",
      columnSettings: orders => [
        {
          column: orders.id,
          readonly: true
        },
        {
          column: orders.customerID,
          getValue: orders =>
            orders.lookup(new models.Customers(), orders.customerID).companyName,
          click: orders =>
```

you can also do the same with a column
![Css Style For The Row](css-style-for-the-row.png)