keywords: 
Name in Magic: **Call Program, Call Subtask**  
Name in the Migrated Code **new ClassName().Run()**

***  

**Call Program**  
In the migrated code a call to a program (class) is done by using the new keyword and calling the Run() method of the Class.  
For example:
````
new OrderDetails().Run();
````

**Call Subtask**  
In the migrated code, a call to a task will appear as a method call, passing an instance of itself as a parameter.  
For example:
````
new OrderDetails(this).Run();
````
