keywords: getting latest version of ENV and firefly,latest version

This article explains how to get the latest version of *ENV* and *Firefly.Box* after switching to developing in .NET


1- Open the AutomaticMigration folder, and launch a new migration (Change the name of Start.Done file to Start)  
2- When the migration is done download the .rar file paste it to temporary folder  
3- Extract it  
4- Copy *ENV* folder + *Firefly.Box.Dll* and paste into your code folder  
![](2017-03-28_11h29_38.png)  
5- Run buildDebug.bat 

![](2017-03-28_11h49_11.png)

## Testing in a controlled environment
We strongly recommend that you do not take this new version immediately into production. It's important to test this in a separate non critical test environment in case the upgrade will cause any bugs.

### Version Control and Git
If you are using version control we recommend that you'll follow the following steps:
1. Create a branch from your code.
2. Integrate the new ENV and Firefly code to the new branch
3. Test the new branch
4. Once it's tested and ok, merge the new branch to your existing master branch.

## Changes to the migrated code
If the new version has changes to the migrated code that you with to integrate, please follow the steps in the following article: