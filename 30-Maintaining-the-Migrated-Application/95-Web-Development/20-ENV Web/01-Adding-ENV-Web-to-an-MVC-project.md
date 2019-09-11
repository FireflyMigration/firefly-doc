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
8. Edit the 'Web.config' located at the root of your MVC project and added this lines:
```csdiff
 <?xml version="1.0" encoding="utf-8"?>
 <!--
  For more information on how to configure your ASP.NET application, please visit
  https://go.microsoft.com/fwlink/?LinkId=301880
  -->
 <configuration>
  <appSettings>
    <add key="webpages:Version" value="3.0.0.0"/>
    <add key="webpages:Enabled" value="false"/>
    <add key="ClientValidationEnabled" value="true"/>
    <add key="UnobtrusiveJavaScriptEnabled" value="true"/>
  </appSettings>
  <system.web>
    <compilation debug="true" targetFramework="4.6.1"/>
    <httpRuntime targetFramework="4.6.1"/>
  </system.web>
+ <system.webServer>
+   <handlers>
+     <remove name="ExtensionlessUrlHandler-Integrated-4.0" />
+     <remove name="OPTIONSVerbHandler" />
+     <remove name="TRACEVerbHandler" />
+     <add name="ExtensionlessUrlHandler-Integrated-4.0" path="*." verb="*" type="System.Web.Handlers.TransferRequestHandler" +preCondition="integratedMode,runtimeVersionv4.0" />
+     <add name="Browser Link for HTML" path="*.html" verb="*"
+        type="System.Web.StaticFileHandler, System.Web, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b03f5f7f11d50a3a"
+        resourceType="File" preCondition="integratedMode" />
+     <add name="ApiURIs-ISAPI-Integrated-4.0"
+    path="/dataApi/*"
+    verb="GET,HEAD,POST,DEBUG,PUT,DELETE,PATCH,OPTIONS"
+    type="System.Web.Handlers.TransferRequestHandler"
+    preCondition="integratedMode,runtimeVersionv4.0" />
+   </handlers>
+   <validation validateIntegratedModeConfiguration="false" />  
+ </system.webServer>
  <runtime>
    <assemblyBinding xmlns="urn:schemas-microsoft-com:asm.v1">
      <dependentAssembly>
        <assemblyIdentity name="System.Web.Helpers" publicKeyToken="31bf3856ad364e35"/>
        <bindingRedirect oldVersion="1.0.0.0-3.0.0.0" newVersion="3.0.0.0"/>
      </dependentAssembly>
      <dependentAssembly>
        <assemblyIdentity name="System.Web.WebPages" publicKeyToken="31bf3856ad364e35"/>
        <bindingRedirect oldVersion="1.0.0.0-3.0.0.0" newVersion="3.0.0.0"/>
      </dependentAssembly>
      <dependentAssembly>
        <assemblyIdentity name="System.Web.Mvc" publicKeyToken="31bf3856ad364e35"/>
        <bindingRedirect oldVersion="1.0.0.0-5.2.4.0" newVersion="5.2.4.0"/>
      </dependentAssembly>
    </assemblyBinding>
  </runtime>
  <system.codedom>
   <compilers>
      <compiler language="c#;cs;csharp" extension=".cs"
        type="Microsoft.CodeDom.Providers.DotNetCompilerPlatform.CSharpCodeProvider, Microsoft.CodeDom.Providers.DotNetCompilerPlatform, Version=2.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35"
        warningLevel="4" compilerOptions="/langversion:default /nowarn:1659;1699;1701"/>
      <compiler language="vb;vbs;visualbasic;vbscript" extension=".vb"
        type="Microsoft.CodeDom.Providers.DotNetCompilerPlatform.VBCodeProvider, Microsoft.CodeDom.Providers.DotNetCompilerPlatform, Version=2.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35"
        warningLevel="4" compilerOptions="/langversion:default /nowarn:41008 /define:_MYTYPE=\&quot;Web\&quot; /optionInfer+"/>
    </compilers>
  </system.codedom>
 </configuration>
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
