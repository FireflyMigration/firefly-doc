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

---
<iframe width="560" height="315" src="https://www.youtube.com/embed/OHh_WC-4ijM?list=PL1DEQjXG2xnKt9tRPRR1YtbITJ3idW-vL" frameborder="0" allowfullscreen></iframe>
