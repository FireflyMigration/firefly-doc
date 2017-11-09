
**Note**: If you can install Visual Studio extensions, use the extension instead of following this manual instructions. Download the extension [here](https://marketplace.visualstudio.com/items?itemName=sefi1.VisualStudioTemplates)
After installing the extension, open Visual Studio and under the Tools menu, select "Tuneup Visual Studio" and click OK

## Visual Studio Templates
Download the latest templates-and-snippets.zip from [Here](https://github.com/FireflyMigration/VisualStudioTemplates/releases). 

### 1 - Placing the Templates folder
In Visual Studio: 
1. Open the "Tools\Options" menu  
![2017 03 08 09H59 27](2017-03-08_09h59_27.png)
2. Select "Project and Solutions"
4. Copy the path under "User item templates location" and open it in your file explorer  
![2017 03 08 10H00 46](2017-03-08_10h00_46.png)
5. Open the "Visual C#" folder  
![2017 03 08 10H01 11](2017-03-08_10h01_11.png)
6. Place the Templates folder from the downloaded zip file, in this directory  
![2017 03 08 10H03 09](2017-03-08_10h03_09.png)

### 2 - Placing the Shortcuts folder
You can place the shortcuts folder anywhere on your local machine - you'll just need to tell Visual Studio where to find it.
1. Goto the "Tools\Code Snippets Manager..." Menu
![2017 03 08 10H04 29](2017-03-08_10h04_29.png)
2. In the Language Combo select "csharp"
3. Click the Add... button
3. Select the "Shortcuts" folder that you've downloaded
![2017 03 08 10H05 26](2017-03-08_10h05_26.png) 

## Other important settings that improve the performance and experience in Visual Studio
The following settings are in the  "Tools\Options" menu
![2017 03 08 09H59 27](2017-03-08_09h59_27.png)
### 1 set "Automatically Populate Toolbox" to False
In the "Windows Forms Designer" tab
![2017 03 08 10H31 14](2017-03-08_10h31_14.png)
**Improves performance** after each build

### 2 - "Debugging" Tab
#### 2.1 - Uncheck "Warn if no user code on launch (Managed only)"
![2017 02 21 07H32 11](2017-02-21_07h32_11.png)
Eliminates the "Symbols for the module 'ENV.dll' were not loaded" message you get every time you run the code
![ENV Message](ENV_message.png)
#### 2.2 - Uncheck "Enable Edit and Continue"
![2017 02 21 06H55 05](2017-02-21_06h55_05.png)
Allows you to edit your code, while the application is running
