# Simple Web Request


1) Open Visual Studio as Administrator
2) In Northwind project, create a new BussinessProcess named "WebDemo"
3) Add the following to the class:

```csdiff
namespace Northwind
{
    public class WebDemo : BusinessProcessBase
    {
+       ENV.IO.WebWriter _ioRequester = new ENV.IO.WebWriter();

        public WebDemo()
        {
+          Streams.Add(_ioRequester);
        }
        public void Run()
        {
+          Exit(ExitTiming.AfterRow);
           Execute();
        }
    }
}
```

`WebWriter` is an object that we use to work with the Web (Similar to Requester in Magic).  
`Streams` is an object which is used to transfer the data.

4) In the OnStart, write a string back to the web page using the `WebWriter`

```csdiff
namespace Northwind
{
    public class WebDemo : BusinessProcessBase
    {
        ENV.IO.WebWriter _ioRequester = new ENV.IO.WebWriter();

        public WebDemo()
        {
           Streams.Add(_ioRequester);
        }
        public void Run()
        {
           Exit(ExitTiming.AfterRow);
           Execute();
        }
        protected override void OnStart()
        {
+            _ioRequester.WriteLine("This is my first web page");
        }
    }
}
```

5) In order to call this program from the web, it needs to have a unique identifier so we should create a public name for this program. 
6) Go to the `ApplicationPrograms.cs` and add a new entry as follows:

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
+           Add("WebDemo", typeof(WebDemo));
            
        }
    }
}
```

Notice that the first parameter is the public name.

7) Now, let’s configure the request URL.

Open the properties of the project (Northwind.Server) and go to the "Web" tab.  
The URL is a combination of Project Url option + Request.aspx?prgname=WebDemo (WebDemo is the unique public name and case sensitive) as follows:  
http://localhost:61988/Request.aspx?prgname=WebDemo (Port number might be different in each computer)

![](WebProperties.png)


8) Build and run (click "Google Chrome" or "Internet Explorer")