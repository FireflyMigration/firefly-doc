keywords: Call to parallel

### Migrated Code Examples:

**Simple Call**

```csdiff
 new ParallelProgAsync().Run();

```

**Using Return context id**
```csdiff
 ContextID.Value = new ParallelProgAsync().Run();

```

The parallel program has an additional class having the same name as the original class suffixed by 'Async'.

This class is the one called when calling the program as parallel.
