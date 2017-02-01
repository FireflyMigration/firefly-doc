### Setup

1.	Add a new project, Visual C#/Test and choose Unit Test Project template, called it NorthwindUnitTests
2.	Add reference to:
    a.	System.Windows.Forms
    b.	Firefly.Box.dll
    c.	ENV.dll
4.	Change the UniTest1.cs file name to BasicUnitTesting.cs and confirm the class rename.
5.	In the class code, add the following using directive:
```csdiff
using System;
using Microsoft.VisualStudio.TestTools.UnitTesting;
+ using Firefly.Box.Testing;

```
6. Make sure it builds.
7. Add this code on the first `TestMethod1()`:
```csdiff
public class BasicUnitTesting
    {
        [TestMethod]
        public void TestMethod1()
        {
+            var a = 1;
+            var b = 2;
+            (a + b).ShouldBe(3);
        }
```
8. Open Test Explorer in the menu Test/Windows/Test Explorer
8. Run the test 
