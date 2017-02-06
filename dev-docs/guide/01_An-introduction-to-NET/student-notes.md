## Access Modifiers
Access modifiers are keywords used to specify the declared accessibility of a member or a type. It determines which code can use this class or method. There are four access modifiers:
* private – only visible to code within class and inner classes 
```csdiff
private void Run()
{
}
private int i;
```
* protected – also visible to code within class that inherit from this class
```csdiff
protected void Run()
{
}
protected int i;
```
* Internal – visible to any code within my assembly (dll/exe)
```csdiff
internal void Run()
{
}
internal int i;
```
* public – visible to any code
```csdiff
public void Run()
{
}
public int i;
```

Defaults:
* Classes are “internal” 
* Members (methods, fields etc…) and inner classes are “private”



## Visual Studio shortcuts

**Ctrl K+D** - Formats the code
**Ctrl+.** - Opens the Light bulb
**Ctrl+,** - Navigate to


 