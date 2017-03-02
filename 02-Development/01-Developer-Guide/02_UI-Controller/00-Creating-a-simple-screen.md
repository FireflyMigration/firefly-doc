In this article we'll:
* Create our ShowOrders UIController without any grid or data
* Call the ShowOrders UIController from the menu


<iframe width="560" height="315" src="https://www.youtube.com/embed/woyyAU4droA?list=PL1DEQjXG2xnKwhPzEwuvVkEL7a_D9-pkL" frameborder="0" allowfullscreen></iframe>

---
# Introduction to UIController
UI Controller is a class that controls the UI interaction.  
It is the equivalent to the Online program in the original application.

The video shows how to create a Folder and in it a Simple UIController and how to add the it to the menu, run the application and call the controller.  
In the next session the UIControllel will be explained.  

######  To create a new Folder in the solution explorer:
1. Stand on the Project where you want to create the folder and RightClick
2. Select 'Add' -> 'New Folder'
3. Give it a name
  

###### To create a new UI Controller:
1. In the solution explorer right click on the Folder you would like to add the new UI controller to it
2. Select ‘Add’ -> ‘New item’
3. On the left pane select ‘Templates’
4. From the Templates list select UIController
5. Give it a name and press the Add button



Two classes are automatically created:
The Controller class – where the logic is written
The View class – the design of the screen (the window of the program)
The two classes will be explained in the next session


###### To Add the Controller to the menu:
1. In the Solution explorer go to the Views folder and DbClick on the ApplicationMDI.cs file
2. Click on the Menu bar and give the menu a name
3. Click outside the menu to save it
4. DbClick on the new created entry - a new method is automatically created.
5. Inside this method call the Controller by typing 
   new FolderName.[SubFolderName].ClassName().Run()
````csdiff
private void ApplicationMdi_Load(object sender, EventArgs e)
{
    new Training.SimpleScreen.ShowOrders().Run();
}
````

