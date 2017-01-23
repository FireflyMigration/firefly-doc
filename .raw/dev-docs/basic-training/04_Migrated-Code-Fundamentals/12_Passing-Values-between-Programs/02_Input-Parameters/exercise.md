### Input Parameters

1.	In the Run method of the “ShowOrderDetails” add a Number parameter named "productID".
2.	Inside the Run method, filter the data by the input "productID".parameter.
3.	In “ShowProducts” screen, put a button at the bottom of the screen and set the Text on the button to “Order Lines”.
4.	Call to the “ShowOrderDetails” screen from the Click event of the button, providing the "ProductID" of the current row in the calling screen. (using _controller)
5.	Comment out the ShowOrderDetails menu entry.
6.	Build and test.
