keywords:Activity, u.ActivityOfParent, u.TranslateTaskActivity, Query, Modify, Create, Delete, Browse, Update, Insert
# Initial Mode

Name in Migrated Code: **Activity**  
Location in Migrated Code: **OnLoad Method**

Values:

| Magic Name | Migrated Code Name      |
|------------|-------------------------|
| Query      | Browse                  |
| Modify     | Update                  |
| Create     | Insert                  |
| Delete     | Delete                  |
| As Parent  | u.ActivityOfParent      |
| By Exp     | u.TranslateTaskActivity |

Example: Browse:
```csdiff
Activity = Activities.Browse;
```
Example: By Parent:
```csdiff
protected override OnLoad()
{   //... other code
    Activity = u.ActivityOfParent;
    // other code
}
```
Example: By Expression:
```csdiff
protected override OnLoad()
{   //... other code
    Activity =  u.TranslateTaskActivity(u.if(1==1,"Q","M")); 
    // other code
}
```

---
**See Also:**

- [UIController Activity Property](http://fireflymigration.com/reference/html/P_Firefly_Box_UIController_Activity.htm)
- [BusinessProcess Activity Property](http://fireflymigration.com/reference/html/P_Firefly_Box_BusinessProcess_Activity.htm)
- [Activities Enum](http://fireflymigration.com/reference/html/T_Firefly_Box_Activities.htm)

---
