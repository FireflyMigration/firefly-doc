## Resident Task  

Name in Migrated Code: **KeepChildRelationCacheAlive**  
Location in Migrated Code: **OnLoad Method**  

Notes:  
This option allows the cache for relations to be stored even when exiting the class. Use this option for scenarios where it is very likely or definite that the class will execute again, requiring the relation cache from before to continue to be available.  
The option is used together with CachedUIController and or Lazy. It is meant solely for the purposes of backward compatibility and should not be used when writing new code. 

Example: 

```csdiff
KeepChildRelationCacheAlive = true;
```
