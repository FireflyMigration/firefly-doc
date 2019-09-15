keywords:Symbols for the module 'ENV.dll' were not loaded, VisualStudioTemplates, Templates, VSDropAssist, Class Outline, Extensions, Bundle, visual studio configuration,configure visual studio, visual studio 2019

In this document we'll detail how we configure Visual Studio 2017 to make the most out of it while working with large migrated applications.

Although this document was written with Visual Studio 2017 in mind, most of it is also relevant to previous versions of Visual Studio.

## A - Visual Studio Extensions
We have created an Extensions Bundle.  
If you're using VS2017, you can download it from: [Extensions Bundle](https://marketplace.visualstudio.com/items?itemName=Firefly-Migration.VisualStudioExtensionBundle)  
If you're using VS2019, you can download it from: [Extensions Bundle 2019](https://marketplace.visualstudio.com/items?itemName=Firefly-Migration.VisualStudioExtensionBundle2019)  

If you are using Visual studio 2015, [please install the extensions manually](extensions-bundle.html) and proceed to item B in this document.

#### After you install the bundle
Please run the Visual Studio Tuneup utility at "Tools\Tuneup Visual Studio"

![2018 12 07 13H23 27](2018-12-07_13h23_27.png)

**if you can't find this menu entry, [please install the extensions manually](extensions-bundle.html)**


## B - Other important settings that improve the performance and experience in Visual Studio
The following settings are in the  "Tools\Options" menu

![2017 03 08 09H59 27](2017-03-08_09h59_27.png)


### B.1 - "Debugging" Tab
#### B.1.1 - Uncheck "Warn if no user code on launch (Managed only)"

![2017 02 21 07H32 11](2017-02-21_07h32_11.png)

Eliminates the "Symbols for the module 'ENV.dll' were not loaded" message you get every time you run the code

![ENV Message](ENV_message.png)

#### B.1.2 - Uncheck "Enable Edit and Continue"

![2017 02 21 06H55 05](2017-02-21_06h55_05.png)

Allows you to edit your code, while the application is running

#### B.1.3 - Uncheck "Enable Diagnostic Tools while debugging"

![2017 02 21 06H54 22](2017-02-21_06h54_22.png)

**Improves performance** when running in Debug

### B.2 set "Automatically Populate Toolbox" to False
In the "Windows Forms Designer" tab

![2017 03 08 10H31 14](2017-03-08_10h31_14.png)

**Improves performance** after each build

### B.3 Disable IntelliTrace
1. Go to the "IntelliTrace" Tab
2. Uncheck the "Enable IntelliTrace" checkbox

![2017 03 08 10H33 43](2017-03-08_10h33_43.png)

**Improves performance** when running in Debug



### B.4 Disable Test Flags (VS2017 only)
1. Go to the "Tests" Tab
2. Uncheck `Discover tests in real time from source files`

![2018 10 07 12H38 11](2018-10-07_12h38_11.png)

### B.5 Check "Collapse #regions when collapsing to definition" (VS2017 only)
1. Go to the "Text Editor\C#\Advanced" Tab
2. Check the "Collapse #regions when collapsing to definition" check box, under "Outlining"  

![2017 03 12 18H01 23](2017-03-12_18h01_23.png)  

**Improves performance**

### C - Disable "Preview Selected Item"
In the "Solution Explorer" window make sure that the "Preview Selected Item" Icon is not checked (highlighted)  

![2017 03 08 10H47 38](2017-03-08_10h47_38.png)

### D - Add the parameter information toolbar item
1. Open any class 
2. On the toolbar
3. Click on the icon highlighted in the image as 2  
![2017 03 08 10H49 18](2017-03-08_10h49_18.png)

4. Select "Add or Remove Button"
5. Select the "Parameter Info" Tool box item.

This adds the following toolbox item, that will show you the parameter information for a method you are parked on

1. ![2017 03 08 10H51 00](2017-03-08_10h51_00.png)
2. ![2017 03 08 10H51 55](2017-03-08_10h51_55.png)

### E - Configure the "GoTo" window
Go To the "Edit\Go To\Go To All..." menu item  in VS2017
![2017 03 08 10H56 02](2017-03-08_10h56_02.png)

> in VS2015 the menu is called "Edit\Navigate To..."

1. Click the "Settings" button  
![2017 03 08 10H57 17](2017-03-08_10h57_17.png)

2. Uncheck the "Use Preview Tab" CheckBox
3. Check the "Show details" CheckBox

### F Uncheck the two checkboxes in the"Search options"
1. Open the solution explorer
2. Press the combo down arrow button to open the search options
3. Uncheck the two checkboxes  
![Search Options](searchOptions.png)  

**Improves search performance**

### G - Configure the "Error List..." Window
1. Go to "View\Error List" menu  

![2017 03 08 10H43 55](2017-03-08_10h43_55.png)

2. Uncheck the "Warnings" tab by clicking on it (Our preference, not mandatory)
3. Uncheck the "Messages" tab by clicking on it (Our preference, not mandatory)
4. Set the combo to "Build Only"  

![2017 03 08 10H45 18](2017-03-08_10h45_18.png)


### H - Recommended extentions
We would like to recommend the following extensions to you:
1. [Viasfora, click to download](https://marketplace.visualstudio.com/items?itemName=TomasRestrepo.Viasfora) - see [Our Review](bracket-colors-in-visual-studio-viasfora.html)
2. [Stack Trace Explorer, click to download](https://marketplace.visualstudio.com/items?itemName=SamirBoulema.StackTraceExplorer) - see [Our Review](stack-trace-explorer.html)
 
