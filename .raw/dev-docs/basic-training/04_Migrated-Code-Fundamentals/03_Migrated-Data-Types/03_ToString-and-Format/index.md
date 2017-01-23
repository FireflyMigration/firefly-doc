## ToString and Format

1.	All the types have a "ToString" method that accepts a format parameter. The syntax to define the format is familiar to any magic developer. 
```
Number n = 1234;
MessageBox.Show(n.ToString("4.2")); // 1234.00
```
2.	Set the myAge variable from the previous page to display the a two digits age without any decimals as follows:
```Diff
- MessageBox.Show("My age is " + myAge.ToString() + "\n" +
+ MessageBox.Show("My age is " + myAge.ToString("2") + "\n" +
                            "I was born in " + myBirthday.Year.ToString()+ " at the " + timeOfDay);
```
3.	The full list of the string format options can be found in our Formatting article.
http://dev.fireflymigration.com/formatting/

4.	Exercise: ToString Format

