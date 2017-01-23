## Date
1.	In Magic, when we needed a date literal we used an expression like ‘01/01/1987’DATE. In .NET we use: 

```
new Date(1987, 1, 1);
```

2.	In .NET, Date.Empty represents an empty date value and Date.Now represents the current date value.

```
Date date = Date.Empty;
date = Date.Now;
```
3.	Dates are numbers behind the scenes (like in magic). Adding numbers to Dates is like adding days. 
```
date = date + 30; // adds 30 days
date = date.AddDays(30);
```
A date value has some useful properties such as:
* date.Year
* date.Month
* date.Day


## Time
1.	In magic, when we needed a time literal we used an expression like ’09:15:30’TIME. In .NET we use:
```
new Time(9, 15, 30);
```
2.	Times act like numbers behind the scenes (like in magic) so adding numbers to a time value is like adding seconds.
```
Time time = new Time(12,0,0);
time = time +60 // adds 60 seconds
time.AddSeconds(60);
```
3.	A time has some useful properties such as:
* time.Hour
* time.Minute
* time.Second
4.	Add a new menu entry in Application.MDI "My Age" and double click it to create a handler for its click event.
5.  Create the following Data Types and display the message
```
private void myAgeToolStripMenuItem_Click(object sender, EventArgs e)
{
    Date myBirthday = new Date(1974, 06, 17);
    Time myBirthTime = new Time(13, 33, 00);
    Number myAge = (Date.Now - myBirthday) / 365;
    Text timeOfDay;

    if (myBirthTime.Hour > 12)
        timeOfDay = "Afternoon";
    else
        timeOfDay = "Morning";

    MessageBox.Show("My age is " + myAge.ToString() + "\n" +
                    "I was born in " + myBirthday.Year.ToString()+ " at the " + timeOfDay);
            
}
```
6.	Build and run from the menu
7.	Exercise: Date and Time

