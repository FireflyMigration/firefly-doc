# Making the most out of Where

One of our customers sent us a question in the following spirit.

How can I do the following using Entities, and reusing the code/db-definition separation:
```
Select count(*) from A where a.col not in
(select b.col from B where x=y)
```
I’ve been meaning to write a blog post about making the most out of “Where”, and this gave me the right excuse to do so.
