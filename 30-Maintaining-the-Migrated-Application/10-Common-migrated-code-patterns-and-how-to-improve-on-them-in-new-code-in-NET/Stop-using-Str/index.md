keywords: dstr, str, tstr, tostring, stringformatting,trim

In magic,  converting numbers dates etc... to string - was unnecessaraly compliated, and as such the migrated code will reflect that.

In this article we'll take a peice of migrated code and demo better ways of writing it including C# 6 style string and more.

Let's review the following code where we define 4 columns, put values in them and display a Message Box.

```csdiff
TextColumn FirstName = new TextColumn("First Name", "20");
TextColumn LastName = new TextColumn("Last Name", "20");
DateColumn BirthDate = new DateColumn("Birth Date", "DD/MM/YYYY");
NumberColumn Age = new NumberColumn("Age", "3");
FirstName.Value = "Noam";
LastName.Value = "Honig";
BirthDate.Value = new Date(1976, 6, 16);
Age.Value = 42;


Message.ShowWarning(
	"Name:" + u.Trim(FirstName) + " " + u.Trim(LastName) + //it's so long that I've put it in two lines
    " Born On " + u.DStr(BirthDate, "DD/MM/YYYY") + " Age " + u.Trim(u.Str(Age, "3")));
```
The result is:
`Name:Noam Honig Born On 16/06/1976 Age 42`

Let's try to focus on the string build in line 11 and 12 and improve on it.
### Step 1 - Replace u.Str and u.Dstr methods with ToString
The `ToString` method is used to convert any object to string, and is what any .NET developer would use, let's do that.
```csdiff
- u.DStr(BirthDate, "DD/MM/YYYY")
+ BirthDate.ToString("DD/MM/YYYY")
- u.Str(Age, "3")
+ Age.ToString("3")
```
```csdiff
"Name:" + u.Trim(FirstName) + " " + u.Trim(LastName) + //it's so long that I've put it in two lines
    " Born On " + BirthDate.ToString("DD/MM/YYYY") + " Age " + u.Trim(Age.ToString("3")));
```

### Step 2 - Remove the Format
In magic you had to specify the `Picture` to the `Str` method. In .NET if you don't specify a `Format` the `Format` that was defined in the column is used.
* This also has the befit that if we change the Format in the Column (or the type) it'll affect all the string conversions
```csdiff
- BirthDate.ToString("DD/MM/YYYY")
+ BirthDate.ToString()
- Age.ToString("3")
+ Age.ToString()
```
```csdiff
"Name:" + u.Trim(FirstName) + " " + u.Trim(LastName) + //it's so long that I've put it in two lines
    " Born On " + BirthDate.ToString() + " Age " + u.Trim(Age.ToString()));
```

>> Some developers in magic tried to solve the problem of redefining the picture in the STR method by calling the varpic command
>> `Str(A,VarPic(A,0))` a nice try to solve a problem that shouldn't have been there to begin with :)

### Step 3 - Remove the ToString
In .NET when the + operator is used between a string and anything - the `ToString` method is called automatically.
This helps us with the Birth Date Column.
```csdiff
- " Born On " + BirthDate.ToString() + " Age "
+ " Born On " + BirthDate + " Age "
```
```csdiff
"Name:" + u.Trim(FirstName) + " " + u.Trim(LastName) + //it's so long that I've put it in two lines
    " Born On " + BirthDate + " Age " + u.Trim(Age.ToString()));
```

### Step 4 - Use C#6 Style string 

In C#6 a new way of building strings was introduced. Simply add the `$` sign before the open quotes, and now you can include members within curley brakets in your string.
```csdiff
- "Name:" + u.Trim(FirstName) + " " + u.Trim(LastName) + " Born On"
+ $"Name:{u.Trim(FirstName)} {u.Trim(LastName)} Born On"
```
```csdiff
$"Name:{u.Trim(FirstName)} {u.Trim(LastName)} Born On {BirthDate} Age {u.Trim(Age.ToString())}"
```
>> The code between the Curley brakets is regular C# code, so you have intelisense and visual studio will keep you safe when you build.

#### Formatting - you can also apply formatting to C#6 style string
Simply put the format after `:` sign. 

For example:
```csdiff
- "Age " + u.Str(Age, "3P0")+ ".";
+ $"Age {Age:3P0}.";
```
Result will be:
`Age 42.`

* For more info about `Format` see [the Formatting article](formatting.html)

>>> The support for migrated style format in C#6 style was added on December 2018 - you can easily add it to source code of older migrations by following this article [Add Support for CSharp 6 String Manipulation Format to Older Code](add-support-for-csharp-6--string-manipulation-format-to-older-code.html)

### Step 5 - Remove the Trim
I HATE TRIM!!!!

In magic any Alpha had trailing spaces to it - so any migrated code behaves like that.

This means that if I try to create a full name by writing `FirstName + LastName + ":"` I'll get:
```csdiff
Noam                Honig              :
    ^^^^^^^^^^^^^^^^     ^^^^^^^^^^^^^^ //the spaces we hate
```

To solve that we've added a new format special character `~` that whenever it's added to a format, it'll make sure it's trimmed.

```csdiff
- $"Name:{u.Trim(FirstName)} {u.Trim(LastName)} Born On {BirthDate} Age {u.Trim(Age.ToString())}"
+ $"Name:{FirstName:~} {LastName:~} Born On {BirthDate} Age {Age:~}"
```
>>> The support for `~` sign as trim in formats was added on December 2018 - you can easily add it source code of older migrations by following this article [Add Support for Telde Format Char to Trim](add-support-for-telde-format-char-to-trim.html)


### The End Result Comparison
```csdiff
+ $"Name:{FirstName:~} {LastName:~} Born On {BirthDate} Age {Age:~}"
- "Name:" + u.Trim(FirstName) + " " + u.Trim(LastName) + " Born On " + BirthDate + " Age " + u.Trim(Age.ToString()));
```

This code is a lot easier to read and is a almost 50% shorter.
