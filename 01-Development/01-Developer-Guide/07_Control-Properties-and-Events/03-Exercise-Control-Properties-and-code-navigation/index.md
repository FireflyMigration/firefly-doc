# Exercise - Control Properties and code navigation

1. Close all open tabs in visual studio. (right click on one of the tabs and select close all documents). 
2. Open **ShowProducts** controller. in the **OnLoad()** find the **View = () => new Views.ShowProductsView(this);** using the <kbd>F12</kbd> navigate to the **code behind** of the form.
3. Go to the Form using the <kbd>Shift</kbd><kbd>F7</kbd>.
4. Go back to the **code behind** using <kbd>F7</kbd>.
5. Find the **code behind** controller parameter,Go back to the **Controller** using <kbd>F12</kbd>. 
6. Now when we know how to navigate from the controller to the form, go to the form and change the following properties:
    1.  **ActiveRowStyle** of the grid to **Border**.
    2.  **AllowFocus** of the **CategoryName** textbox to **False**.
    3.  **BackColor** of the **ProductName** textbox to **LightBlue**.
    4.  **Font** of the **ProductName** textbox to **Bold**.
7. build and test.
8. Change the following properties of the grid control:  
    1.	**RowColorStyle** to **AlternatingRowBackColor**.
    2.	**AlternatingBackcolor** to **WhiteSmoke**.
9.	Build and test.
10. Notice that the grid properties override the textbox one.
11. Change **back** the  **RowColorStyle** to **ByColumnAndControls**.
12. Build and test.


