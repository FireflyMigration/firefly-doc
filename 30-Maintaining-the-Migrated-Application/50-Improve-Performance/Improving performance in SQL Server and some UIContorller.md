keywords:DisableFirstRowOptimization
Sometimes you may have a UIController that views a large set of data and you have all the correct index but still, you'll see queries taking long.

The annoying thing is that you take these queries and run them in SQL Studio they run quickly.

A possible cause is the "First-row optimization".

When we define a cursor for a  UIController we use some optimizations that hint to the database, that we may only want the first few rows and not the entire data result.

In some cases, this can confuse the database and cause it to actually take longer.

IN these cases for entities that inherit from SQLEntity - try setting the `Cursor.DisableFirstRowOptimization` property of the entity to true.

IT should look something like this:
```csdiff
From = Orders;
Orders.Cursor.DisableFirstRowOptimization = true;
```
And test - you'll might see a considerable improvement. I just had a screen that took 5 seconds to load reduced to 0 just by changing this flag.


We use the First Row Optimization by default for UIControllers both because the original application used it and because in most cases it works great.

Apply these setting on a case by case basis and see if it solves it to you.

So far we haven't been able to identify a general rule on when to apply this



Another interesting flag, is `Cursor.UseStaticCursorAsFallbackCursor`
This will improve performance when working with complicated views with group by etc...

Let us know if you this helps, or if you have another case that you want us to investigate and figure out.
