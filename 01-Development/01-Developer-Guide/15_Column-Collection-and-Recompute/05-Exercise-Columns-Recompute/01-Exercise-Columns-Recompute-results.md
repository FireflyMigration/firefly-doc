# Exercise - Columns Recompute result

The **ShowProducts** class should look like :
```csdiff
using System;
using System.Collections.Generic;
using System.Text;
using System.Drawing;
using Firefly.Box;
using ENV;
using ENV.Data;

namespace Northwind.Exercises
{
    public class ShowProducts : UIControllerBase
    {

        public readonly Models.Products Products = new Models.Products();
        public readonly Models.Categories Categories = new Models.Categories();
        public readonly NumberColumn TotalValueInStock = new NumberColumn();
        public ShowProducts()
        {
            From = Products;
            Relations.Add(Categories, RelationType.Find,
                Categories.CategoryID.IsEqualTo(Products.CategoryID));

            Where.Add(Products.CategoryID.IsEqualTo(2).Or(Products.CategoryID.IsEqualTo(4).Or(Products.CategoryID.IsEqualTo(6))));
            Where.Add(Products.UnitPrice.IsGreaterThan(25));

            OrderBy = Products.SortByProductName;

 +          Columns.Add(Products.ProductID);
 +          Columns.Add(Products.ProductName);
 +          Columns.Add(Products.CategoryID);
 +          Columns.Add(Products.UnitPrice);
 +          Columns.Add(Products.UnitsInStock);
 +          Columns.Add(Products.UnitsOnOrder);
 +          Columns.Add(Categories.CategoryID);
 +          Columns.Add(Categories.CategoryName);
 +          Columns.Add(TotalValueInStock).BindValue(()=> Products.UnitPrice*Products.UnitsInStock);
        }

        public void Run()
        {
            Execute();
        }

        protected override void OnLoad()
        {
            View = () => new Views.ShowProductsView(this);
        }

        protected override void OnSavingRow()
        {
            InputValidation();
        }
        #region expressions
        private void InputValidation()
        {
            if (Products.ProductName == "")
                Message.ShowError("Product name is empty!");
            if (Products.UnitsInStock == 0 || Products.UnitsOnOrder == 0)
                System.Windows.Forms.MessageBox.Show("Units is zero");
            if (Products.UnitsInStock < 10)
                Message.ShowWarning("Not enough units");
            if (Products.UnitsOnOrder >= 50 && Products.UnitsOnOrder <= 100)
                Message.ShowError("Units on order are between 50 and 100");
            if (u.Len(u.Trim(Products.ProductName)) < 3)
                Message.ShowError("Please enter a valid product name");
            if (u.InStr(Products.ProductName, "%") >= 1 || u.InStr(Products.ProductName, "@") >= 1)
                Message.ShowError("% and @ are invalid characters in product name");
            if (u.Left(Products.ProductName, 1) == "T")
                Message.ShowWarningInStatusBar("Product name can't start with a T");
            if (ValidateCaregoryID())
                Message.ShowError("Please enter a valid category");
        }

        private bool ValidateCaregoryID()
        {
            return !Relations[Categories].RowFound;
        }

        public Number TotalUnits()
        {
            return Products.UnitsInStock + Products.UnitsOnOrder;
        }
        #endregion
    }
}
```
