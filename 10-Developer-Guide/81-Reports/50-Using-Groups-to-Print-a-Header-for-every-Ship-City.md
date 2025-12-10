Keywords:batch, businessprocess, report, sections, groups

# Using report sections with groups

<iframe width="560" height="315" src="https://www.youtube.com/embed/YLe2IfL5dOM?list=PL1DEQjXG2xnLss44EgCJq1bAM-Blgf2jd" frameborder="0" allowfullscreen></iframe>

---

#### Let's design our report, so every Ship City will have its own title:
1. Add a new sections, named ShipCityHeader
2. Copy the ShipCity from the grid in the details section to the new ShipCityHeader section
3. Set it with an appropriate font 

#### In the report controller
1. In the constructor add the required OrderBy
2. Add a group usign the *gro* snippet
3. Specify the column that, upon changing, will display the new section
4. Specify which section to write whenever a new ShipCity is reached


```csdiff
OrderBy.Add(Orders.SortByCustomerID);

Groups[Orders.ShipCity].Enter += () => 
{
    _layout.ShipCityHeader.WriteTo(_Printer);
};

```
