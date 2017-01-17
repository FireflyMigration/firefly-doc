## Access Modifiers
Access modifiers are keywords used to specify the declared accessibility of a member or a type. It determines which code can use this class or method. There are four access modifiers:
* private – only visible to code within class and inner classes 
```csharp
private void Run()
{
}
private int i;
```
* protected – also visible to code within class that inherit from this class
```csharp
protected void Run()
{
}
protected int i;
```
* Internal – visible to any code within my assembly (dll/exe)
```csharp
internal void Run()
{
}
internal int i;
```
* public – visible to any code
```csharp
public void Run()
{
}
public int i;
```

Defaults:
* Classes are “internal” 
* Members (methods, fields etc…) and inner classes are “private”

