This article explains how to add the ENV.Web functionality to an MVC project.

It assumes that you've followed the steps outlined in [Configuring an MVC Project with to reuse Migrated Applications](configuring-an-mvc-project-with-to-reuse-migrated-applications.html)

1. Download the `ENV.Web.dll` from the [github repo](https://github.com/FireflyMigration/ENV.Web/releases) 
2. Place `ENV.Web.dll` in the lib folder.
3. Make sure that the dll is not blocked by windows, by opening the file properties and check the `unblock` checkbox.
4. Add a reference to it, in your MVC project.
5. Add a new controller and call it `DataApiController`
6. Place the following code there:
```csdiff
public class DataApiController : Controller
{
    static ENV.Web.DataApi _dataApi = new ENV.Web.DataApi();
    static DataApiController()
    {
    }
    // GET: DataApi
    public void Index(string name, string id = null)
    {
        _dataApi.ProcessRequest(name, id);
    }
}
```
7. Edit the `RouteConfig` class to route to the added controller:
```csdiff
public static void RegisterRoutes(RouteCollection routes)
{
    routes.IgnoreRoute("{resource}.axd/{*pathInfo}");
+    routes.MapRoute("DataApi", "dataApi/{name}/{id}", new { controller = "DataApi", action = "Index", name = UrlParameter.Optional, id = UrlParameter.Optional });
    routes.MapRoute(
        name: "Default",
        url: "{controller}/{action}/{id}",
        defaults: new { controller = "Home", action = "Index", id = UrlParameter.Optional }
    );
}
```

That's it, you are configured to use ENV.Web.
Review the following articles on how to use it:
1. [creating the server api](creating-the-server-api.html)
2. [making the rest api updatable](making-the-rest-api-updatable.html)
3. [create view model](create-view-model.html)
4. [automatically generating order id on a new row.html](automatically-generating-order-id-on-a-new-row.html)
5. [server side validation made easy](server-side-validation-made-easy.html)
6. [additional server side features](additional-server-side-features.html)
7. [exposing a migrated report to the web](exposing-a-migrated-report-to-the-web.html)