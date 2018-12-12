keywords: Bind, BindValue

# BindValueToColumnChange()

---

BindValueToColumnChange() is a special kind of binding a value.
A normal BindValue will determine the recompute path on its own based on the position of the columns.
With BindValueToColumnChange(), using the second parameter of the method, you can control which columns will affect the recompute path **regardless of their position**.
This is a new and powerful feature which enhances the capabilities of the recompute path. (Does not exist in Magic)
