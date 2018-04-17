# Merge data from a table

Now, let’s create a program which will display data from a table.  
We will use an HTML template for the program called [WebProducts.html](WebProducts.html) (right Click -> save link as)

1) In Northwind, create a new BussinessProcess named "WebProcess"
2) Add the Products table:

```csdiff
namespace Northwind
{
    public class WebProducts : BusinessProcessBase
    {
+       public readonly Models.Products Products = new Models.Products();
        public WebProducts()
        {
+           From = Products;
        }
        public void Run()
        {
            Execute();
        }
    }
}
```

3) Add `WebWriter` and `TextTemplate` objects and initiate them in the OnLoad method:

```csdiff
namespace Northwind
{
    public class WebProducts : BusinessProcessBase
    {
        public readonly Models.Products Products = new Models.Products();

+       ENV.IO.WebWriter ioRequester;
+       ENV.IO.TextTemplate htmlPage;
        
        public WebProducts()
        {
            From = Products;
        }
        public void Run()
        {
            Execute();
        }
        protected override void OnLoad()
        {
+           ioRequester = new ENV.IO.WebWriter();
+           htmlPage = new ENV.IO.TextTemplate(@"c:\WebProducts.html");
        }
    }
}
```

4) Add `Streams` object:

```csdiff
  protected override void OnLoad()
        {
            ioRequester = new ENV.IO.WebWriter();
            htmlPage = new ENV.IO.TextTemplate(@"c:\WebProducts.html");
+           Streams.Add(ioRequester);
        }
```

5) Add the HTML tags:

```csdiff
  protected override void OnLoad()
        {
            ioRequester = new ENV.IO.WebWriter();
            htmlPage = new ENV.IO.TextTemplate(@"c:\WebProducts.html");

+           htmlPage.Add(
+               new Tag("ProductID", Products.ProductID),
+               new Tag("ProductName", Products.ProductName)
+               );

            Streams.Add(ioRequester);
        }
```

The first parameter is the tag name inside the HTML template (case-sensitive) without the `!$MG_` - <!$MG_ProductID>.  
The second parameter is the value which will replace the tag during runtime.  


6) In the OnLeaveRow, Write the HTML page to the requester

```csdiff
        protected override void OnLeaveRow()
        {
+            htmlPage.WriteTo(ioRequester);
        }
```


7) Add the program to `ApplicationPrograms.cs`:

```csdiff
namespace Northwind
{
    class ApplicationPrograms : ENV.ProgramCollection 
    {
        public ApplicationPrograms()
        {
            Add(3, "Show Customers", "", typeof(ShowCustomers));
            Add(4, "Show Products", "", typeof(ShowProducts));
            Add(5, "Show Orders", "", typeof(ShowOrders));
            Add(6, "Print - Order", "", typeof(Print_Order));
            Add(7, "Print - Orders", "", typeof(Print_Orders));
            Add("WebDemo", typeof(WebDemo));
+           Add("WebProducts", typeof(WebProducts));           
        }
    }
}
```

8) In the project settings, based on the previous page, update the URL with the new public name:  
http://localhost:61988/Request.aspx?prgname=WebProducts


9) Build and run (click "Google Chrome" or "Internet Explorer")