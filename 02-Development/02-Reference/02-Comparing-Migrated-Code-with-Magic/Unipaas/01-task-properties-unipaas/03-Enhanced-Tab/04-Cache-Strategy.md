# Cache Strategy

The cache strategy that will be used for any specific table is determined by the property defined with the entity definition in the Class.  
See: From. * As a reminder, here is the code for a table definition in a Class that will switch the cache on. 
```csdiff 
readonly Model.Categories _categories = new Model.Categories { Cached = true }; 
```
