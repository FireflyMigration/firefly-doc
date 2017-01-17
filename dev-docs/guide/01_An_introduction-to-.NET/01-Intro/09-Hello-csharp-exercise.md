
**Exercise: Hello CSharp**

1. In the Solution Explorer, find the main project (Marked in Bold).  
2. Add a folder called Exercises  
3. Add a class called "HelloCSharp" (don't use the # sign, it's an invalid character in a class name)  
3. Add the run method   
```csharp
public void Run()
{
}
```
4. Add a call to the `System.Windows.Forms.Show` method
4. In the Views folder find the ApplicationMdi form and open it the Visual Studio’s form designer.
2. Add a new menu called “Exercises”
3. Add a new entry called “Hello C#”
4. When clicking the menu, call the "HelloCSharp" class we've just created.
```csharp
new Exercises.HelloCSharp().Run();
```
5. Add comments to describe your code.
6. Build and run.
7. In the beginning of the file, add using directive to `System.Windows.Forms` namespace
8. Add another message box, using shorter syntax, to show the following message: “Shorter is better”
9. Build and run.
10. Using the “mbox” snippet, add another message box to show the following message: “Snippets are cool!”
11. Build and run.

<iframe width="560" height="315" src="https://www.youtube.com/embed/27AHai9Oygc" frameborder="0" allowfullscreen></iframe>