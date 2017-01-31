## Refactoring

**1. 	Rename Method**

When you have a method (usually an expression method) with a bad name, replace it to a meaningful method name.

**2. Extract Method**

Whenever you find a long code that is not clear or similar code that is duplicated, use Extract method to put the code in a method with meaningful name.

**3. Replace SubTask with Entity Methods**

If you find a sub task that is used to insert/ delete a row, you can replace it with the Insert / Delete methods of the entity, which makes the code much shorter and simpler.

**4. Replace a relation with GetValue**

If you find a simple relation that is used as a description lookup, you can replace it with the GetValue method of the entity. If the columns of the id is based on Types, you can add this functionality to the type itself so that it can be reused to get the description wherever the id column is available to the program.
