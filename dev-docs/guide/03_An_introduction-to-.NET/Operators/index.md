# Operators

1. So in this folder *Training*, click right again **Add/New Item**, choose Class application template by choosing in the left pane Installed, Visual C# Items, and then choosing Class in the middle pane. Name the class NumericOperators.cs at the bottom of the Name dialog.
2. Define the following variables as shown below 

```diff
+ using System.Windows.Forms;
namespace Northwind.Training
{
    class NumericOperators
    {
+       public void Run()
+       {
+        MessageBox.Show("Numeric operators");   
+        int i = 5;        
+        i = i + 2;     
+        MessageBox.Show("i="+ i);   
+       }     
    }
}
```
3. add a new entry named “Numeric Operators” in the applicationMdi.

```csharp
private void numericOperatorsToolStripMenuItem_Click(object sender, EventArgs e)
{
	new Training.NumericOperators().Run();
}
```
4. Build and run the application
5. But there's a way to write shorter
```diff
 using System.Windows.Forms;
namespace Northwind.Training
{
    class NumericOperators
    {
       public void Run()
       {
        MessageBox.Show("Numeric operators");   
        int i = 5;        
        i = i + 2;     
        MessageBox.Show("i="+ i);   
+        i +=3;
+        MessageBox.Show("i=" + i);   
       }     
    }
}
```
6. Build and run the application
7. You can do with plus (`+`), with minus (`-`), or multiple (`*`)
```diff
 using System.Windows.Forms;
namespace Northwind.Training
{
    class NumericOperators
    {
       public void Run()
       {
        MessageBox.Show("Numeric operators");   
        int i = 5;        
        i = i + 2;     
        MessageBox.Show("i="+ i);   
        i +=3;
        MessageBox.Show("i=" + i);   
+       i *=2;
+       i -=3;
+       MessageBox.Show("i=" + i);   
       }     
    }
}
```
8. Build and run the application
9. Instead of doing `i += 1;` you can do `i++ ;`. of course if you want decrease your value instead of `i -=1; ` you can write `i--;`
10. Exercise : Operators
<iframe width="560" height="315" src="https://www.youtube.com/embed/L4acMJvm_fE?list=PL1DEQjXG2xnKI3TL-gsy91eXbh3ytOt6h" frameborder="0" allowfullscreen></iframe> 