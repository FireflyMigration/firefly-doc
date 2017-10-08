# Setup the Web templates configuration

1. Please make sure that Northwind.Server project is included in your solution.  
2. In Some cases you will need to run Visual studio as administrator, you will know that this is needed if the server project failed to load.  
3. For the solution to run as a web server please make sure that the server project is set as the "start up project".  

![NWServer](NWServer.png)


######  Members of the server:
1. The server ini file: controls the server project settings  
![2017-10-08_16h02_46.png](2017-10-08_16h02_46.png)

2. AppServerConfig : set up the environment variables and load the ini file  
![2017-10-08_16h20_11.png](2017-10-08_16h20_11.png)

````

