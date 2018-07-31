In the migrated code folder you'll usually find two Visual Studio solution Files
* Standard (in our case, Northwind.sln)
* Full (in our case, Northwind Full.sln)

### The Standard Solution
Contains only the startup project (In our case, Northwind) and you can add to it any project that you would like to work on.

### The Full Solution
Contains all the projects that were migrated, in one big solution.

The drawback of using the Full solution is that it requires a lot of resources from Visual Studio. 


For example, the "CRS" Solution, takes 41 seconds to load, and requires 229mb when it's fully loaded.

The "CRS Full" Solution, that contains all the source code of 57 projects,  will appear in under a minute, but can take up to 7:37 Minutes to load (including all the background threads), and requires 1,441 mb when it's fully loaded.

You might think, *"well that's ok, I have a 16gb ram machine"*, but unfortunately, Visual Studio is a 32bit application, which means that it can only use about 2gb of ram - so when you use the "CRS Full" Solution, you start by pushing Visual Studio to it's limits, and that's only your starting point.

Every operation that you perform there after, will take longer - since visual studio is already using most of it's allocated resources.

## Our Recommendation
I'm guessing that you can see where this is going, we recommend that you'll use the "Standard" Solution for all your day to day development.
Have as many solution files as you like, each with only the few relevant projects to that specific module/code area.  
You'll end up developing faster and enjoying visual studio more.

Only use the "Full" Solution when you need to do something that touches all your code, such as a wide "Find Reference", or a refactoring that changes the names of something that is used throughout the code.



<iframe width="560" height="315" src="https://www.youtube.com/embed/-MuUxigaxFU" frameborder="0" allowfullscreen></iframe>