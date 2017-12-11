keywords: task properties, advanced, single instance
# Single Instance

Name in Migrated Code: **SingleInstance**  
Location in Migrated Code: **Asynch class constructor**

![Task-Properties-Advanced-single-instance](Task-Properties-Advanced-single-instance.jpg)

## Example:
```csdiff
    public class MyProgram2Async : AsyncHelperBase 
    {
        public MyProgram2Async()
        {
            SingleInstance = true;
        }
    }

```
---
