In this page we'll:
* Explain how to create a method with return type
* Create a method called `ShipperDoesNotExist` and use it in our If Statement
```csdiff
bool ShipperDoesNotExist()
{
    return !Relations[Shippers].RowFound;
}
```
* Use the "Extract Method" visual studio refactoring to create the `InvalidOrderDate` method


<iframe width="560" height="315" src="https://www.youtube.com/embed/167q9f19unM?list=PL1DEQjXG2xnK0hrpTQpa2p8ZvEMPsvh7n" frameborder="0" allowfullscreen></iframe>