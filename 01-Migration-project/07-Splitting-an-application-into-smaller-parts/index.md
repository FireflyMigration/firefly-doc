keywords: namespaces

# Splitting an application into smaller parts

During the conversion process, you can easily group programs / tables into projects.  
This can be done by adding a text file named “<project>.namespaces” to the AutomaticMigraion folder on the FTP.  
Each line in the file represents a project in the result .NET solution.  
You can group several programs into one project using any of the following syntax:  
1-236, Accounting  
312,342, Reports  
400-499, Reports.WhareHouse  
592-636, 684,690, Batch_Process  
700-, Orders  
Folder_name,Items  
Folder_name,Folder_name,Shipping  
This is a short clip demonstrating the file format and the result: 

<iframe width="560" height="315" src="https://www.youtube.com/embed/iM62RuR0_F0" frameborder="0" allowfullscreen></iframe>

A few things you have to keep in mind:
1. Note the casing of the names (Microsoft usually recommends using [CamelCase](https://en.wikipedia.org/wiki/CamelCase))
2. Use “_” as a space.
3. Optimal use of Microsoft Visual Studio, you should keep the size of each project around 10MB, which will result in a dll sized ~1.5MB.  

This file can be changed at any time until the final migration, so you can try different structures.
