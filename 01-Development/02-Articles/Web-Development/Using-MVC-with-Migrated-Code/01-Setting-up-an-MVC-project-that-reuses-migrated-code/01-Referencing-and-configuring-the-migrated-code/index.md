# Referencing andWe need to add a reference to the projects that we want to use, and the DLLs that these projects are using.

So in our case, we’ll add a reference to the:

1. ENV
2. NorthwindBase
3. Northwind.Part1
4. Firefly.box.dll

We’ll also need to add a reference to the System.Windows.Forms .NET assembly, as some enums from it are used in the migrated code (such as System.Windows.Forms.Keys etc…). configuring the migrated code: