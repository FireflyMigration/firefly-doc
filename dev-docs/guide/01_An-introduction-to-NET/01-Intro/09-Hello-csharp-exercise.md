**Exercise: Hello CSharp**

1\. In the Solution Explorer, find the main project (Marked in Bold).  
2\. Add a folder called Exercises  
3\. Add a class called "HelloCSharp" (don't use the # sign, it's an invalid character in a class name)  
4\. Add the run method   
```csdiff
public void Run() 
{
} 
```
5\. Add a call to the `System.Windows.Forms.Show` method  
6\. In the Views folder find the ApplicationMdi form and open it the Visual Studio’s form designer.  
7\. Add a new menu called “Exercises”  
8\. Add a new entry called “Hello C#”  
9\. When clicking the menu, call the "HelloCSharp" class we've just created.  
```csdiff
new Exercises.HelloCSharp().Run();
```  
 
10\.  Add comments to describe your code.  
11\. Build and run.  
12\. In the beginning of the file, add using directive to `System.Windows.Forms` namespace  
13\. Add another message box, using shorter syntax, to show the following message: “Shorter is better”  
14\. Build and run.  
15\. Using the “mbox” snippet, add another message box to show the following message: “Snippets are cool!”  
16\. Build and run.  

---

<iframe width="560" height="315" src="https://www.youtube.com/embed/27AHai9Oygc?list=PL1DEQjXG2xnKI3TL-gsy91eXbh3ytOt6h" frameborder="0" allowfullscreen></iframe>



---