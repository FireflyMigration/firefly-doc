1. Right click on the solution and add a new project of type "Class Library", from the "Windows Classic Desktop" folder and call it `Northwind.ModuleName`
2. Delete the class.cs - we don't need it.
3. In project settings:
   1. Make sure that it has the same .NET framework version of the original app.
   2. configure the Build "Output path" to: `..\bin\` for both Debug and release configuration.
4. Add the project to the `msbuild.xml` file - so that it'll get included when you run the `BuildDebug.bat` and `BuildRelease.bat`

```csdiff
 <?xml version="1.0" encoding="utf-8" ?>
 <Project DefaultTargets="Step4" xmlns="http://schemas.microsoft.com/developer/msbuild/2003" ToolsVersion="3.5">
    <Target Name="Step1" DependsOnTargets="">
    <MSBuild Projects=".\ENV\ENV.csproj;"  BuildInParallel="true"  StopOnFirstFailure="true"/>
    </Target>
    <Target Name="Step2" DependsOnTargets="Step1">
    <MSBuild Projects=".\NorthwindBase\NorthwindBase.csproj;"  BuildInParallel="true"  StopOnFirstFailure="true"/>
    </Target>
    <Target Name="Step3" DependsOnTargets="Step2">
-   <MSBuild Projects=".\Northwind.Customers\Northwind.Customers.csproj;.\Northwind.Products\Northwind.Products.csproj;.\Northwind.Orders\Northwind.Orders.csproj;"  BuildInParallel="true"  StopOnFirstFailure="true"/>
+   <MSBuild Projects=".\Northwind.NewModule\Northwind.NewModule.csproj;.\Northwind.Customers\Northwind.Customers.csproj;.\Northwind.Products\Northwind.Products.csproj;.\Northwind.Orders\Northwind.Orders.csproj;"  BuildInParallel="true"  StopOnFirstFailure="true"/>

    </Target>
    <Target Name="Step4" DependsOnTargets="Step3">
    <MSBuild Projects=".\Northwind\Northwind.csproj;"  BuildInParallel="true"  StopOnFirstFailure="true"/>
    </Target>
  </Project>
```

5. Add references to:
   * From the `Assemblies` tab:
        1. System.Windows.Forms
        2. System.Drawing
   * From the `Browse` tab, select from the project's `bin` directory the following dlls:
        1. ENV
        2. Firefly.Box
        3. NorthwindBase
        4. (Northwind.Share for larger migrated solutions)
6. Add a reference to it where ever you need it, or for more complex scenarios, use the AbstractFactory pattern described in: [Calling Controllers across project scopes](http://doc.fireflymigration.com/calling-controllers-across-project-scopes.html)
   

   <iframe width="560" height="315" src="https://www.youtube.com/embed/b2oRTV-cYGE" frameborder="0" allowfullscreen></iframe>