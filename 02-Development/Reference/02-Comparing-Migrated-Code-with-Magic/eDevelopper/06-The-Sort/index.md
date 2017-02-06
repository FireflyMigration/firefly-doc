# Introduction
This article is one of a series of articles aimed at providing further orientation with the migrated code for Magic programmers. This time we will look at the 'Sort' screen as it appears in eDeveloper (version 9) and show the equivalent representation of this form of sorting in the migrated code.

---

## The Sort Screen
A screen shot of eDeveloper's Sort screen appears below:

![Sort Screen](sort2.jpg)

The following explains the equivalent to the Sort Screen in the migrated code.

Name in Migrated Code: **OrderBy**  
Location in Migrated Code: **InitializeDataView method**  

Example:
```csdiff
void InitializeDataView()
{
    From = Categories;
    OrderBy.Add(Categories.CategoryName, SortDirection.Descending);
    OrderBy.Add(Categories.Description);
```
Notes:  
For an index specified in the Task Properties Screen, see: [Task Properties Screen - Index](Task-Properties.html)  
If the 'Unique' radio button is selected in Magic, this is reflected in the migrated code in the example below.  
Example:  
```csdiff
       void InitializeDataView()
        {
            From = Categories;
            OrderBy.Add(Categories.CategoryName, SortDirection.Descending);
            OrderBy.Add(Categories.Description);
            OrderBy.Unique = true;
```
### See Also:  
* [UIController OrderBy Property](Task-Control.html)  
