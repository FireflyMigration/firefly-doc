In special cases, copy *ENV* folder and *Firefly.Box.Dll* is not enough and you need merge the new migrated code with your code. 


1- Open the AutomaticMigration folder, and launch a new migration (Change the name of Start.Done file to Start)  
2- When the migration finished take the folder, copy the .rar file paste it to temporary folder  
3- Extract it and rename as folder_**new**  
4- Go back to the AutomaticMigration folder, migrate to an older version of Firefly (before the fixing of issue), you may do so by changing the "Start.Done" to "Start.[version number]" (E.g "Start.26175").  
5- Copy the .rar file paste it to temporary folder  
6- Extract it and rename as folder_**old**  
7- Compare the old folder and the new folder (you can use Beyond Compare)  

![](2017-03-28_16h28_59.png)  

8- Merge only the compare result with your code  
9- Copy ENV folder + Firefly.Box.Dll and paste on your code folder   

![](2017-03-28_11h29_38.png)  

10- Run buildDebug.bat  

---

![](2017-03-28_15h29_27.png)