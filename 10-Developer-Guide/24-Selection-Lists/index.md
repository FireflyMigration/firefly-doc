Keywords:online, uicontroller, selection, select, zoom

# Selection Lists

<iframe width="560" height="315" src="https://www.youtube.com/embed/JI4VyFsso-w?list=PL1DEQjXG2xnKzD8ASzFC1KFYHRQKVk2nC" frameborder="0" allowfullscreen></iframe>

---

Selection list allows the user to select values from a pre-defined set of values (usually a table).

In this set of articles we will learn how to:
1. Create a selection list controller
2. Set the allowed activities of a controller
3. Learn about the AllowSelect
4. Pass the parameter
5. Determine which row should the program park on
6. Use the Expand event
7. Use a generic SelectionList utility

For this example, let's create a SelectShippers controller that will allow the user to select a shipper from the shippers entity.
Basically we can start with a regular UIController class that uses the shippers entity as its main table and place the ShipperID and CompanyName columns on the view.

