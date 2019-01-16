# Web Parameters


1) Add a local NumberColumn named "_prodid"
2) In the Run Method, Add a `NumberParamter` named "prodid"
3) Bind the paramenters
4) Add a Where filter based on the _prodid

```csdiff
 public class WebProducts : BusinessProcessBase
    {
        
        public readonly Models.Products Products = new Models.Products();

+       public readonly NumberColumn _prodid = new NumberColumn();

        ENV.IO.WebWriter ioRequester;
        ENV.IO.TextTemplate htmlPage;

        public WebProducts()
        {
            From = Products;
+           Where.Add(Products.ProductID.IsEqualTo(_prodid));
        }
        public void Run(NumberParameter prodid)
        {
+           BindParameter(_prodid, prodid);
            Execute();
        }
```

5) In order to send argument to the application we will add another parameter to the url:  

    ARGUMENTS=-N45

    -N meants that this a numeric value  
    -A Alpha  
    -L boolean   

6) Let's concatenate the arguments to the URL using "&" as follows:  
http://localhost:61988/Request.aspx?prgname=WebProducts&arguments=-N45

7) Build and run (click "Google Chrome" or "Internet Explorer")
