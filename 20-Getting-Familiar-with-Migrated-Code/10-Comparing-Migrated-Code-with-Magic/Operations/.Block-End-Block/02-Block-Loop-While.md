
Name in Magic: **Block Loop or Block While**  
Name in the Migrated Code **u.StartBlockLoop() method**
***

Example:

````
u.StartBlockLoop();
while(u.AdvanceBlockLoop() &&(u.LoopCounter() <= 5))
{
    num3.SilentSet(num3 + u.LoopCounter());
}
u.EndBlockLoop();
````