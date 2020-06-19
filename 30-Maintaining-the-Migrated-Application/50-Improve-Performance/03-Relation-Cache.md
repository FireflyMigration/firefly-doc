# Relation Cache

In this video we explain the basics of Cache in the context of a relation

```csdiff
Cached = true
```
Will cache relations results that are based on a unique query (id=7 etc...) and were found in the database.
If the query did not return a result, it'll not be cached. (for example id=0)
```csdiff
CacheEmptyResult = true
```
Will also cache queries that did not return any value
```csdiff
CacheNonUniqueResults = true
```
Will also cache the result of non unique queries (id<10 etc...) 



---
<iframe width="560" height="315" src="https://www.youtube.com/embed/QVCjg8nNCyU?list=PL1DEQjXG2xnKt9tRPRR1YtbITJ3idW-vL" frameborder="0" allowfullscreen></iframe>
