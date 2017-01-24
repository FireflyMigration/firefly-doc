## The OnSavingRow

1.	In the next section we will focus on the OnSavingRow method. This method, similar to the Record Suffix in magic, is called whenever the user is leaving a row that has been changed.  This makes it a good place for our input validation.
## Preventing the user from leaving a bad row - and the flow abort exception

1.	Notice that the MessageBox.Show method alone **does not prevent the user from leaving a bad row.**
2.	Let's change it to use the Message.ShowError method, **which also prevent the user from leaving a row**, similar to the “Verify Error” in Magic. 
```diff
protected override void OnSavingRow()
{
    if (Orders.ShipName == "") ANAT - MATCh TO YEAR AS I DID IN THE VIDEO
    {
-       //System.Windows.Forms.MessageBox.Show("Please enter a ship name");
+       Message.ShowError("Please entera ship name");
    }

}
```

Anat!!!!talk a little about the flow abort exception
3.	More methods are available in the ENV.Message class, such as ShowWarning, ShowErrorInStatusBar and ShowWarningInStatusBar.
4.	Exercise: Input Validation Using the Message Class 
## The if Statement

1.	Before we start to write input validation code, let’s get to know the "if" statement in C#.
2.	The "if" statement, similar to a block in Magic, causes the program control to be transferred to a specific flow, depending on a Boolean expression.
3.	In C#, a group of related statement called a block and enclosed by curly brackets {}. 
4.	Here is a simple example of the "if" statement:
```diff
protected override void OnSavingRow()
        {
-           System.Windows.Forms.MessageBox.Show("The saving row event occurs only if the record has changed");
+           if (Orders.ShipName == "")   MATCh TO YEAR AS I DID IN THE VIDEO
+           {
+               System.Windows.Forms.MessageBox.Show("Please enter a ship name");
+           }
        }

```
5. Below are the following comparison operators
    1. Equals ( == ), like = in Magic. Notice that = in C# is an assignment operator.
    2. Not equals ( != ) , like  <> in Magic.
    3. Greater than ( > )
    4. Less Than ( < )
    5. Greater or equal  ( >= ) 
    6. Less or equal ( <= )
    7. And ( && ), like "And" in Magic
    8. Or ( || ), like "Or" in Magic
6.	Note that all the operators are in the student's workbooks.
7.  Exercise: Input Validation Using if Statement



## Using User Methods (Magic Functions)
1.	In some cases we may want to do more complex input validation. For instance, we may need to validate that an email address contains the ‘@’ sign.
2.	To simplify this, we have a list of functions that we can use, most of them are familiar to a Magic developer. The source code of all the functions is in ENV.UserMethods class.
3.	The developer get access to all of the functions using the u member of the UIController class.
Assume that the ShipName field is not allowed to contain the ‘@’ sign, let’s add a second input validation check:

```diff
+           if (u.InStr(Orders.ShipName, "@") > 0)
+           {
+               Message.ShowError("The '@' sign is not allowed in the ship name field");
+           }
```
4.  You can go to the definition of the function to see its implementation in the UserMethods class of the ENV project.
5.  Notice that the User Methods class includes the C# implementation of all the Magic functions, so you can get familiar with it.

6.  Exercise: Using User Methods

##Add a remark that if you need to use the UserMethods (u) in classes that don't have u - see XXX article (and video in that article) where we explain how to use the UserMethods in non migrated code 



## RowFound validation

1.	Another common input validation verify that the user’s input exists in the related table.  For example, we may want to validate that the shipper id of a the order exists in the shippers table.
2.	The RowFound property of a Relation returns True if a row was found by the relation and False if not. This property is useful when we need to validate that
3.	In the ShowOrders screen, the ShipVia column must be one of the shipper’s in the Shippers table (i.e. 1, 2 or 3). If the user enters any other value such as 4 or 5, we need show an error message.
4.  To do this, we need to get the relation object, as follows:
```diff
protected override void OnSavingRow()
        {
            var r = Relations[Shippers];
        }
```
5.  Then, we can check if the RowFound property of the relation and if it’s false (notice the negation operator in the following example), display a message to the user:
```Diff
protected override void OnSavingRow()
{
    var r = Relations[Shippers];
+   if (!r.RowFound)
+   {
+       Message.ShowError("Shipper Id Does not exist");
+    }
}
 ```
6.	Let’s build and test with different values:
    a.	Run the application and open the ShowOrders screen.
    b.	Enter 1, 2 or 3 in the ShipVia columns and notice that the company name is returned by the relation.
    c.	Enter 4 or 99 and notice that a message is displayed and no company name is returned. 
7.	We can combine these steps together as follows:

```diff
protected override void OnSavingRow()
{
-     var r = Relations[Shippers];
-        if (!r.RowFound)
-        {
-            Message.ShowError("Shipper Id Does not exist");
-        }
+    if (!Relations[Shippers].RowFound)
+    {
+        Message.ShowError("Shipper Id Does not exist");
+    }
}
```
Build and test.

Exercise: RowFound Property
