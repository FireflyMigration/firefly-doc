# How to handle the “Usage of magic’s icon in toolbar, please replace with your own” message from the migration log

This message appears in the migration log whenever a menu entry icon was specified using the “Tool number” and not the “Tool image” property:

![](Menu_properties_Tool_number.png)

The icon resided in a Magic dll and has to be replaced in the migrated code.

All the icons of the migrated code are located in the resources.resx file, found in the properties of the startup project:

![](Solution_explorer_resources.png)

Opening this file will show you all the icons – some of the most commonly used ones (such as copy, cut, delete, VCR, etc.) are included in the file.

In order to update a toolbar menu item:

1. Open the ApplicationMdi view in the designer (located in the Views folder of the startup project)  
2. Click on the icon in the tool bar (note: it will not be displayed, you need to know its location and click on an “empty” icon)  
3. Open its properties  
4. Park on the Image property and press the ellipsis (the “…” icon)  
5. In the “Select Resource” window you can choose an existing icon or press the Import button to select an external icon (16*16 pixels) that will be used  
(it will be added automatically to the resources.resx file)

![](ApplicationMDI_tool.png)
 