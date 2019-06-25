keywords:32-bit,64-bit, x86,x64

In this article, we'll explain when you should and should not change your application to 64-bit (aka x64) and how

## What is 64-bit and 32-bit
64-bit and 32-bit (also known as x64 and x86 respectively) represent the length in bits of a pointer in memory. When you use 32-bit the process is limited to use 2gb of ram (sometimes 4gb in special cases).
When you use 64 bit you can use a lot more.

Over the years Windows have switched to 64 bit - to allow the computers to use more than 4gb of ram - these 64-bit operations systems can run an application that where compiled to 64 bit and also an application that where compiled to 32 bit.

***You can't have within the same process dlls that use 64-bit and dlls that use 32-bit**

## Can the migrated code be compiled to 64 bit
Yes - the migrated code and all code provided by firefly fully support 64 bit **BUT** when you use 64 bit, you need to make sure that any code that is external to the migration is also compiled in 64 bit. 
This includes any external dll that the application uses, including:
1. Any com object that the application uses (office etc...)
2. Any C++ or Delphi dlls that you call using `CallDll`, `UDF` etc... (get.dll, hotfudge.dll etc...)
3. The database gateway dll - for example, if you use Btrieve - the gateway dll is 32-bit
   

If you don't use any of these, you can safely move to 64 bit after doing significant testing to the application.

## Most applications don't need 64 bit
You only need to compile as 64 bit, if your application process is planning to use more than 2gb of RAM. Most desktop applications should not use more than 2gb of ram for many other reasons - so these applications do not need to be 64-bit.

64-bit versions of windows can safely and natively run 32-bit applications.

Many commonly used applications still use 32-bit, for example, Visual Studio 2019 is a 32-bit application (and even most installed versions of office are 32 bit)

## Why isn't 64 bit the default for the migration
Since magic is 32 bit, and since most applications use some external dlls, we decided that the migration will produce a 32-bit application - you can easily change that once you take control over the code.

## How to change an application to compile to 64 bit
By default, the migrated code is configured to compile as "Any CPU" which means that any of the migrated dlls can be used in a 64-bit scenario.
To change the application to run as 64 bit, you'll need to :
1. Go to the entry project (the exe project) properties.
2. Select the `Build` tab
3. Uncheck the `Prefer 32-bit` checkbox 
4. Compile your application and test it

**Note that we do not recommend switching to 64-bit unless you need more than 2gb of ram for your process, because most applications use external dlls that will complicate the move to 64-bit**