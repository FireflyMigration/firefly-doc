# Pragma

Did you ever have a piece of code you wanted to be available only in certain conditions ?  
In most cases you would add an If statement with the relevant condition.  
But what if you had the ability to instruct the compiler not to  compile this piece of code ?  

Well - with C# you can.  
It is called **Pragma**, which is a part of [C# preprocessor directives](https://docs.microsoft.com/en-us/dotnet/csharp/language-reference/preprocessor-directives/).  
The **Pragma** provides the compiler with special instructions for the compilation of the file in which it appears.

One useful example is the **#if** - only when the condition is true, the compiler will compile the code inside the if block.  
## Example:
```csdiff
#if DEBUG
DoSomething()
#endif
```
In this example, the part in the **#if** will not be compiled when building the code in Release mode.