keywords:plugin, dependency injection, abstract factories

For software houses that maintain a product, there is the common problem of customer specific code.  
Sometimes we need to create some specific implementation of a specific program for a specific client.
The migrated code is designed using a plugin architecture, that allows you to implement this with ease.


We'll start by creating a new exe project that the customer will use - and call the original Northwind application.

Then we'll create our own client specific implementation of the `ShowCustomers` screen.

We'll register the new Controller with the `AbstractFactory` to return the customer implementation.

# Creating the Client specific exe project
1. Add a new winforms project called 'Northwind.AClient'
2. Delete 'Form.cs' and 'App.Config' as we don't need them
3. Change the build output to '..\bin\' for both debug and release.
4. Add a reference to 'Northwind.exe'
5. change the program main to call the the original Program main.

# Adding the custom screen
1. Add references to: 'NorthwindBase.dll', 'ENV.dll' and 'Firefly.Box.dll' from the project's bin directory
2. Add the new Controller.
3. Implement the Interface
4. Register the Abstract Factory
