In this article we'll explain how to configure an MVC project to work with a migrated project.

# Add a new MVC project
1. Choose - add new project, and select `ASP.NET Web Application (.NET Framework)`

2. In the next wizard page, select the `Empty` template, and check the box next to `MVC`. You can also check the boxes next to `Web.API` and `Web Forms` if you want to use these technologies as well.
> we choose the `Empty` template, because all other templates contain demo code that we don't need.


# Required References
Add references to the following:
1. `Firefly.Box.DLL`
2. `ENV`
3. Your project (`Northwind`)
4. Your base project (`NorthwindBase`)

# Configuring the project
1. Copy the ini file to the web application project.
2. Make the following changes to the `global.asax.cs` file
```csdiff
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using System.Web.Optimization;
using System.Web.Routing;
+using ENV;
+using ENV.Data.DataProvider;

namespace NorthwindMVC
{
    public class MvcApplication : System.Web.HttpApplication
    {
        protected void Application_Start()
        {
            AreaRegistration.RegisterAllAreas();
            FilterConfig.RegisterGlobalFilters(GlobalFilters.Filters);
            RouteConfig.RegisterRoutes(RouteTable.Routes);
            BundleConfig.RegisterBundles(BundleTable.Bundles);

+           //additions related to the migrated code
+           Common.SuppressDialogs();
+           UserSettings.DoNotDisplayUI = true;
+
+            ConnectionManager.UseConnectionPool = true;
+
+            //sets the current directory to the web folder directory
+            Environment.CurrentDirectory = HttpContext.Current.Server.MapPath("");
+            
+            // Call the init of the original application to load it's ini and other settings
+            Northwind.Program.Init(new string[0]);
        }
+        [ThreadStatic]
+        static IDisposable _profilerContext;
+        protected void Application_BeginRequest(object sender, EventArgs e)
+        {
+            // will cause any uicontroller that is called to exit.
+            Firefly.Box.Context.Current.SetNonUIThread();
+            // enabled profiler for every request.
+            _profilerContext = ENV.Utilities.Profiler.StartContextAndSaveOnEnd(() => ENV.ProgramCollection.CollectRequestPArametersForProfiler(), () => VirtualPathUtility.MakeRelative("~", Request.Url.AbsolutePath).Replace("/", "_") + "_" + Firefly.Box.Date.Now.ToString("YYYYMMDD") + "_" + UserMethods.Instance.mTime().ToString());
+        }
+        protected void Application_EndRequest(object sender, EventArgs e)
+        {
+            // close the profiler context if exists
+            if (_profilerContext != null)
+            {
+                _profilerContext.Dispose();
+                _profilerContext = null;
+            }
+            // release all resources, including connections etc...
+            Firefly.Box.Context.Current.Dispose();
+        }
    }
}
```

# Important note
When calling a migrated controller from a web project please remember that the `ApplicationCore` class's `OnStart` method is called before each request, and the `OnEnd` method is called after each request.

We recommend that you adjust these method to run as little code as possible for performance considerations.
