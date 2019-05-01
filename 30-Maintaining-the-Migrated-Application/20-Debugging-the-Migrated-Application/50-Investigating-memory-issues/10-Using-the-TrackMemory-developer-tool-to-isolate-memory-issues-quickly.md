# Using the TrackMemory developer tool to isolate memory issues quickly
 
 In this video we show how you can use the `TrackMemory` ini flag to isolate and reproduce memory issues or leaks.
 
## What is a memory leak reproduction
A memory leak reproduction is a set of steps that can be followed and represent a constant increase in memory, that if these steps are repeated again and again - you'll see a  constant increase in memory.
 
 You can see that increase in the report that the `TrackMemory` flag shows - but it's crucial that this increase will be repetitive and if the steps are followed enough times will lead to hundreds of mb of memory usage, and eventually an out of memory exception.
 
 Such an increase will either manifest itself as a constantly increasing count of a live `Controller` or a constantly increasing value in the memory information detailed when using `TrackMemory`
 
 Here are the memory counters that are documented when using the `TrackMemory` flag:
 ```
   After GC Collect:
.Net Memory: 13
WorkingSet: 93
PeakWorkingSet: 122
PrivateMemorySize: 70
VirtualMemorySize: 318
Handles: 449
 ```
 
 If you perform an operation N times (where N is at least 10) and see a constant increase in any of these values - then it's a start of a reproduction that can be investigated.
 
 ## What is not a memory leak
 If you run a controller, exit it and don't see a decrease in memory in the windows task manager - it's not enough to determine a memory leak.
 Memory management in .NET is not necessarily linear - .NET uses a garbage collector to clear memory - when .NET sees fit and not necessarily after a controller is closed.
 
 Also, some times controllers stay in memory due to some functions that still need to be aware of the last running controller.
 
 Another case where a controller remains in memory is when `Cached<>` is used to call it.
 
 
---
<iframe width="560" height="315" src="https://www.youtube.com/embed/teR4BCWOrBs" frameborder="0" allowfullscreen></iframe>
