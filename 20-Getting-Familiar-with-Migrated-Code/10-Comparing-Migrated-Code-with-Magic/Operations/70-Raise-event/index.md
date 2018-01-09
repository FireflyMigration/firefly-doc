keywords: Raise event

![Raise Event](RaiseEvent.png)  

  
Raise event operation with **wait = Yes** migrated to **Invoke()** method  
Raise event operation with **wait = No** migrated to **Raise()** method

### Migrated Code Examples:


**System event**

```csdiff
Invoke((Keys.Control|Keys.D1));
```

**Internal event**

```csdiff
Raise(Command.GoToNextControl);
```

**Public event**

```csdiff
Invoke("MuPublicEvent");
```

**User event**

```csdiff
Invoke(MyUserEvent);
```

**User event with wait = No**
```csdiff
Raise(MyUserEvent);
```

**With arguments**
```csdiff
Invoke(MyUserEvent, vNumber1, 25);
```

**With Destination context name**
```csdiff
RaiseOnContext("Main", MyUserEvent, vNumber1, 25);
```

### See Also
[Handlers and Commands](handlers-and-commands.html)




