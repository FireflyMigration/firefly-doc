keywords:build solution fails,reference to dlls
Many magic applications are big, they have  and even thousands (and sometimes tens of thousands) of screens.

The migrated C# code of such a large application is also big.

Working in Visual Studio with such a large codebases can be slow and cumbersome. Furthermore, all referenced components code is also available in Visual Studio causing an even larger amount of code being loaded in Visual Studio and an ever slower experience.

After much investigation and experience, we came to the conclusion that the best way to get the best experience out of Visual Studio is to work with multiple small solutions, each one having only several projects that we care about and not the entire code base. 

Working like this results in a much better developer experience and faster response time.

## How does it work?
There are two ways of working with references between different projects:
### Reference to Projects
In .NET when you have a few projects in a single solution you'll use a method called `Reference to Projects`  where each project adds a reference to the other projects in the solution it needs.

In this method, every project has a `bin\debug` and a `bin\release` folder that holds the dll that was built out of the project and all the other dlls it references.

### Reference to Dlls
The method we use is called `Reference to Dlls`.

In this method, all the projects build their code into a shared `bin` folder in the solution's root directory, and all the references are done to dlls in that bin folder.

The order in which the projects are built (And their dependency upon each other) is stored in a file called `msbuild.xml` that has the required steps to build the projects in the correct order.
> if you want to understand more on how to edit the `build.xml` see: [Adding a new project to a migrated solution
](adding-a-new-project-to-a-migrated-solution.html)

The advantage of this approach is that you can have many small solutions that work very fast in visual studio.

The migration is delivered initially with two solutions:
1. The Standard Solution, Northwind.sln - which contains the startup projects.
2. The Full Solution, Northwind full.sln that contains all the project - although you are not expected to use it often.

We recommend that you'll use multiple small solutions that are based on the Standard Solution and add the projects you require to it.


You can read more about it in [Standard Solution vs Full Solution
](standard-solution-vs-full-solution.html)

> Only use the full solution when you want to do a big (slow) cross-reference across your entire code base. If you want to see an alternative approach to doing cross-reference on a large application see: [Find all References Across my entire Codebase
](find-all-references-across-my-entire-codebase.html)

## How do I use this in my day to day?
When you get a new version of the code from the source control, you'll run `BuildDebug.bat` outside visual studio to build your entire code base.

As you develop in your application, you'll only build the projects you are working on, you'll do that in Visual Studio.

Occasionally you'll run the `BuildDebug.bat` file outside visual studio to see that it all builds well.

## I'm trying to build my project using the `Build Solution` option in Visual Studio and it fails, why?
Since each project is referencing the dlls of the other projects, visual studio can't understand the order in which the projects should be built and as such tries to build them all in parallel and fails.

The `build.xml`  file contains the correct order in which the projects should be built.

So, don't use `Build Solution` from within visual studio, instead use the `builddebug.bat` file.

## But I really really want to use Build Solution
You can let visual studio know about the order of the builds in the solution, by right clicking the solution, and selecting `Project Build Order` we recommend against it because:
1. It's very tedious to configure.
2. You'll need to maintain it both in the solution file and in the build.xml


## We want to use Reference to Projects
IF you want to use Reference to Projects, you can ask us to configure the migration to produce a solution with reference to projects.

But we recommend against it, as in our experience working with many many large .NET solutions, the reference to dlls provides  significantly faster experience in Visual Studio.


## Why do everyone we know use reference to Projects
Most .NET teams don't have applications as big as yours. Most .NET solutions have 10-15 projects in them and visual Studio works great in such a scenario.

But your code reflects many many more years of development, tens and even hundreds of projects in the solution, and this requires a more specialized setup to enjoy Visual Studio to it's fullest.

