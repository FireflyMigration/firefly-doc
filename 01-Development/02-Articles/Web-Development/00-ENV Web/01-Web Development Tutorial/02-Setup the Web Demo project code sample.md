
You can follow each commit done in the preparation for this tutorial at:
https://github.com/FireflyMigration/ENV.Web/tree/dev-demo-2017-10

## Visual Studio Configuration
* Visual studio 2017 version 15.3.5 or later
* Make sure that both "ASP.NET and web development" and "Node.js development" options checked in Visual studio features configuration
![2017 10 16 10H13 01](2017-10-16_10h13_01.png)

## Setup Typescript
* [Typescript sdk for Visual Studio](https://www.microsoft.com/en-us/download/details.aspx?id=55258)

## Setting up the SQL Server user
Open file WebDemo/Global.asax.cs

Locate the following line of code:
```csdiff
ConnectionManager.SetDefaultUserAndPassword("sa", "MASTERKEY");
```
Please change the user to any SQL user that has access to your database.
Since this code runs under IIS, and not the current windows user, an SQL user is required.

## The code used in this demo
You can download the files that are used for this tutorial on https://github.com/FireflyMigration/ENV.Web/releases/tag/v0.0.2-pre-alpha

Please use the 2017-10 version


### Northwind Version
This demo is using the NorthwindTraining project that is used for training.
If you have a version older than 9/2017, please contact us to get a recent version.


### Important Note about video
In the video we used version 2017-09, please use version 2017-10


<iframe width="560" height="315" src="https://www.youtube.com/embed/v7wcvqU6HeU" frameborder="0" allowfullscreen></iframe>

