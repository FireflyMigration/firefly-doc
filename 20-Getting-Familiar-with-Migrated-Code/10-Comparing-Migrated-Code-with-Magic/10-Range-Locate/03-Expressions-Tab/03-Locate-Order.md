keywords: task properties, range, locate, SQL where, expressions, order

Name in Migrated Code: **StartFromLastRow**  
Location in Migrated Code: **OnLoad**  

![2018 02 25 12H10 17](2018-02-25_12h10_17.jpg)

## Example:
```csdiff
protected override void OnLoad()
{
    StartFromLastRow = true;
    StartFromFirstRowIfStartOnRowWhereFails = true;

```

> The ```StartFromFirstRowIfStartOnRowWhereFails = true;``` was added automatically. It displays the "Row not found - positioned at begining" message in case the requested row was not found.


