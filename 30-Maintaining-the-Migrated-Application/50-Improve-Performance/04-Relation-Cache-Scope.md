# Relation Cache - Scope

In this video we discuss the scope of Cache for a relation and how to extend it

```csdiff
public class DemoCache : BusinessProcessBase
{
  public DemoCache()
  {
+   Entities.Add(new Models.Shippers());
  }
  protected override void OnStart()
  {
    for (int i=0; i < 10; i++)
    {
-     new Child().Run();
+     Cached<Child>().Run();
    }
    Exit();
  }
  public class Child : BusinessProcessBase
  {
    Models.Shippers Shippers = new Models.Shippers()
    {
      Cache = true
+     , KeepCacheAliveAfterExit = true
    }
  }
}
```
Steps:
1. Replace `new` with `Cached` on the call.
2. Add `KeepCacheAliveAfterExit = true` to the Entities you want to cache
3. Add the entity that you want to cache - to the parent controller you want to cache it in using `Entities.Add`
* It doesn't have to be the direct parent, it can be 1 ore more levels up in the stack (grand parent etc...)
* If the entity is already in use in the parent (in a `From` or a `Relations.Add`) , you don't need to add it again
---
<iframe width="560" height="315" src="https://www.youtube.com/embed/OHh_WC-4ijM?list=PL1DEQjXG2xnKt9tRPRR1YtbITJ3idW-vL" frameborder="0" allowfullscreen></iframe>
