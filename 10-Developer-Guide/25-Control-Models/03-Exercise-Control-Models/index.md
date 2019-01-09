# Exercise - Control Models

1. Using the **Solution Explorer** open the **Base** Project and navigate to **Shared.Theme.Controls** Folder.
2. Right click on the **Controls** folder and add new item using the **BaseControl** template, name it **MandatoryTextBox**.
3. Open the **Properties** panel and set :
3.1 **BackColor** = LightCoral.
3.2 **Border** = Thick
3.3 **BorderColor** = Red
4. Change the panel to show **Events**.
5. Double click the **InputValidation** event and show **Error** message if the **this.Text == ""**;
6. **Build** the **Base Project**.
7. Open the **ShowProducts**.
8. Use **Class Outline** and navigate to the **view**.
9. Right Click the ToolBoox and **Add Tab** name it **My controls**.
10. Right click anywhere on the **form** (**Do not** Right click a control like the grid on the form) and select **Add Controls To Toolbox**.
11. Navigate to the **bin folder** of your solution and select the **NorthwindBase.dll**.
12. In the new windows that open navigate to **Northwind.Shared.Them.Controls** and expend it.
13. select the  **MandatoryTextBox** and click the **Add to ToolBox** button.
14. Drug and drop the **MandatoryTextBox** to the screen set the **Data** property to point to the **Products.ProductName**.
15. Delete the current textBox in the ProductName Column with the new **MandatoryTextBox**.
16. Save changes to Git.
17. Build and test , try to delte the product name from one of the rows in Runtime, and check that you get the error message.