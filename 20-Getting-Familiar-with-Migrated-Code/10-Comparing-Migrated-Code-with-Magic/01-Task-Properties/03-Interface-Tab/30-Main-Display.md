keywords: Task Properties, Interface Tab, Main display 

Name in migrated code: **View**  
Location in migrated code: **OnLoad**


![Main Display](MainDisplay.png)


## Migrated Code Example

'2'Form in Magic:

```csdiff   
protected override void OnLoad()
{
+    switch ((int)(2))
            {
                default:
                    View = () => new Views.MyMainDispDisplay1(this);
                    break;
                case 3:
                    View = () => new Views.MyMainDispDisplay2(this);
                    break;
            }
}
```        
Condition as an expression:

IF(User(0)='SUPERVISOR',2,3) in Magic:

```csdiff   
protected override void OnLoad()
{
+     switch ((int)(u.If(ENV.Security.UserManager.CurrentUser.Name == "SUPERVISOR", 2, 3)))
            {
                default:
                    View = () => new Views.MyMainDispExpDisplay1(this);
                    break;
                case 3:
                    View = () => new Views.MyMainDispExpDisplay2(this);
                    break;
            }
}
```        


