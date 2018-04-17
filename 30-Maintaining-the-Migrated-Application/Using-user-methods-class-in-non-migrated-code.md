keywords:u. UserMethods u.IniGet
# Using the user methods class in non migrated code 
 
 In the migration, user methods are accessed using the `u` member. That member is defined in the base class as protected and is available for any class that inherits from it.
 
It is implemented in `BusinessProcessBase`, `UIContorllerBase`, `FlowUIControllerBase`, `Form`, `TextColumn`, `NumberColumn` etc...

If you want to use the UserMethods in other classes you'll need to create an instance for it:
```
var u = new ENV.UserMethods();
if (u.IniGet('SomeFlag')=="Y")
  Do Something();
```

Or you can use a helper instance for that called `UserMethods.Instance`
```

if (ENV.UserMethods.Instance.IniGet('SomeFlag')=="Y")
  Do Something();
```



<iframe width="560" height="315" src="https://www.youtube.com/embed/p84Yl6tVc_E" frameborder="0" allowfullscreen></iframe>
