keywords: Call By Name, Call Public, RunByPublicName, RunProgramFromAnUnreferencedApplication

## Introduction
Call By Name or Call Public is Magic operation, which allows to dynamically call a program using its public name. Usually, the called program is known only at execution time.  
This article explains how this is implemented in the migrated code. This is backward compatible, we'll discuss best practices and suggest some improvements for making dynamic calls in new .NET programs.

## Calling a Program from the Same Application
Suppose we have an order list screen and we want to call the "ShowCustomerDetails" (public name) program to display the current order customer details.  
Here is a simple example of calling a program from the same application, using its public name.
```csdiff
Application.AllPrograms.RunByPublicName("ShowCustomerDetails", Orders.CustomerID);
```
For simplicity, the public name is hard coded, so there is nothing dynamic here. In real life, the name can come from a variable, db, user input or any other source which evaluates at execution time.

### Remarks
1. This line of code can be in any part of the program logic (where we have a value for the Orders.CustomerID argument). It can be used by clicking a button, or when entering / leaving a row.
2. There is a program in the application with public name "ShowCustomerDetails" and which accepts a CustomerID parameter.
3. The CustomerID argument being passed is a TextColumn, however, the RunByPublicName method accepts an array of object parameters, as it is dynamic call, so there is no type checking.


## Calling a Program from another Application
Following the previous example, let's assume that the "ShowCustomerDetails" program is in another Flat File/ Cabinet File. 
This was often the case, as a technique to avoid circular reference between Magic Components.  
Here is how the migrated code would look like:  
```csdiff
Application.RunControllerFromAnUnreferencedApplication(@"c:\NorthwindUnipaas\Norhtwind.ecf","ShowCustomerDetails", Orders.CustomerID);
```

Again, in real-life, the name of the cabinet file and the public name will be dynamically evaluated at execution time.
### Remarks
1. As before, the line of code can be in any part of the program logic.
2. There is a cabinet file named c:\NorthwindUnipaas\Northwind.ecf, which contains a program with public name "ShowCustomerDetails".
3. The "ShowCustomerDetails" program accepts a CustomerID parameter.
4. The CustomerID argument being passed is a TextColun, however, the RunControllerFromAnUnreferencedApplication method accepts and array of object parameters, as it is dynamic call, so there is no type checking.
5. Notice that the ecf file name should be mapped to the .NET assembly, by adding the following to the Magic.ini file:
    ```csdiff
    [MapMff2Dll]
    Northwind = Northwind.exe
    ```

## Pros and Cons
Calling programs dynamically have some caveats:
1. As with any dynamic code, there is no type checking, so sending a number instead of a text can be easily missed. The compiler will not be able to help.
2. Finding usages of the called program, will not include dynamic calls in the results.
3. Any change to the called program, such as adding parameters, changing parameter type or changing the public name, might break existing calls without the compiler ability to check it.
4. There is also a security risk here. If the program public name is coming from user input, the user can potentially input any program public name and call it unsolicitedly.

It is always proffered to call programs directly when possible. Most of the reasons for using dynamic calls in Magic has better alternatives in .NET:
1. For avoiding circular reference, use the AbstractFactory, which is built in the migrated application. See [this](http://doc.fireflymigration.com/calling-controllers-across-project-scopes.html) for more details.
2. It is recommended to use a switch statement for dynamically selecting the called program at execution and calling the selected program directly in each case statement, levering the type checking of the compiler. This allows you the dynamic behaviour without the drawbacks mentioned above. In any case, avoid calling a program by name (or number) which is based on user input.

## See Also
* [Setting up an MVC Project that Reuses Migrated Code](http://doc.fireflymigration.com/setting-up-an-mvc-project-that-reuses-migrated-code.html) 
