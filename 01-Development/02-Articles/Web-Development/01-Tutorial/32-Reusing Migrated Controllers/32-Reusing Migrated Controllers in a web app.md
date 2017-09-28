In the HomeController class
```csdiff
public class HomeController : Controller
{
    public ActionResult Index()
    {
        return View();
    }
+   [ENV.Web.PrintToPDF]
+   public void Print(int id)
+   {
+       new Northwind.Orders.Print_Order().Run(id);
+   }

    public ActionResult About()
    {
        ViewBag.Message = "Your application description page.";

        return View();
    }
```

[Commit info on GitHub](https://github.com/FireflyMigration/ENV.Web/commit/f70ee9992f02a814ea7bc67149bbe91fa4de1b25)

<iframe width="560" height="315" src="https://www.youtube.com/embed/KMiPQ4zSBdM?list=PL1DEQjXG2xnJOSQf2421r1S040NkvCApp" frameborder="0" allowfullscreen></iframe>