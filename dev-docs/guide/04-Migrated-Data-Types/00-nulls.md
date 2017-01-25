Null is a special value in .NET representing that a value was not set for a field
Strings can be null.
When trying to access members of a field that is set to null – you’ll get the “Null Reference Exception”
Any type which is a class can be null 
Any field within a class  that is not set – will default to null

Types that can’t be null
Int, DateTime etc… can’t be null because they are structs. 
Enums can’t be null – IE Sort Direction
