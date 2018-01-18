keywords: Range, Filtering

## IsDifferentFrom()

---


When we want to filter data we often use **IsEqualTo()** or **IsGreaterThan()** methods.  
Another useful method is **IsDifferentFrom()** method which displayed below  



The IsDifferentFrom() method can be used on any of the data type columns.  
It is very useful when we want to filter the records to see all of them except for the ones we are not interested in.

For example:  
Using flights table, if we want to see all the flights in a specific date but we don’t interesting in a flight to London we will filter the data using the IsDifferentFrom() method as displayed below:  

```csdiff
void InitializeDataView()
{
    From = Flights;

    Where.Add(Flights.FlightDate.IsEqualTo(() => Date.Now));
    Where.Add(Flights.DestinationCity.IsDifferentFrom("London"));
}
```



If we are not interested in flights to London and Tel-Aviv we will use the filter as displayed below 

```csdiff
Where.Add(Flights.DestinationCity.IsDifferentFrom("London").And(Flights.DestinationCity.IsDifferentFrom("Tel-Aviv")));
```
