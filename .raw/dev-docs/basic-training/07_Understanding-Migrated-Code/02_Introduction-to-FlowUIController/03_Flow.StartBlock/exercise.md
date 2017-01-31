### Flow Block
1.	In “FlowProducts”, after the OrderID, Using nested `Flow.StartBlock` and `Flow.StartBlockElse` methods, add code that greets the user according to the current time (Good morning, Good evening etc). 
2.	Hint -  `Time.Now.Hour`
3.	Build and test.

### FlowUIController Summary
1.	Create a new FlowUIController named “FlowEmployees”.
2.	Add a grid with the following columns from the "Employees" table you created earlier in exercise "Creating New Types"
    a.	EmployeeID
    b.	LastName	
    c.	FirstName
    d.	Title
    e.	City
    f.	Region
    g.	ReportsTo
3.	Using the `Flow.Add`, add input validation to the "LastName" column and "FirstName" column and show an error message if the value is empty, Tab only, Forward only.
4.	Using the `Flow.Add` method and ExpandBefore flow mode, add selection list for the "ReportsTo".
5.	Build and test.
