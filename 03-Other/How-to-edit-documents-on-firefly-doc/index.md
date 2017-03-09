keywords: md, markdown,mark down
Here is a short video on how to contribute to the doc.fireflymigration.com web site:

<iframe width="560" height="315" src="https://www.youtube.com/embed/yX9qum4tDAQ" frameborder="0" allowfullscreen></iframe>

---
The documents in our documentation site are written with the **Markdown** language.

Here are some guide lines to help you edit the content affectively:

### File name 
The file name cannot contains spaces, instead use the hyphen sign to separate between the words.  
for example: Column-Collection-and-Recompute.md  
 
### Document Title  
Do not specify a title to the file as by default the title is taken from the file name. The hyphen are replaced with spaces. 

### Internal titles    
To display titles inside the document use '###' before the text.  

```
### My Internal Title
```
### My Internal Title


### New line    
To force new line add 2 spaces at the end of the line. 

### Keywords
Keywords are used to make the document searchable also based on text that doesn’t appear in the document itself.
Keywords are added at the top of the document using this syntax: 
``` 
keywords: text1, text2, text2 
```

### Emphasis
Bold - add 2 asterisks before and after the text.  
Italic - add single astrike before and after the text.  

| Code                       | Result                 |
| -------------------------- | --------------------- |
| ``` **Bold text**   ```    | **Bold text**         |
| ``` *Italic text*   ```    | *Italic text*         |



### code
 A code section should be prefixed by 3 back-ticks and the phrase csdiff and suffixed by another 3 back-ticks

![](Img2017-02-19_10h55_17.png)


```csdiff
private void ApplicationMdi_Load(object sender, EventArgs e)
{
    new Training.SimpleScreen.ShowOrders().Run();
}
```

### code change highlighting

**new code line** – should start with the sign + (plus);  
**removed code line** - should start with the - (minus) sign.

![](Img2017-02-19_10h50_30.png)

```csdiff
private void ApplicationMdi_Load(object sender, EventArgs e)
{
-    new Training.SimpleScreen.ShowOrders().Run()
+    new Training.SimpleScreen.ShowOrders().Run();
} 
```  


### Youtube video Link
Use the Embed option in youtube share button, copy the link and paste it in the document.


### Image
Make sure to upload the image and use the bellow syntax:  
 
| Code                                       | Result                                  |
| ------------------------------------------ | --------------------------------------- |
| ``` ![FireflyLogo](FireflyLogo.png) ```    | ![FireflyLogo](FireflyLogo.png)         |



### Link  
To add a link use the below syntax  

| Code                                                    | Result                                           |
| ------------------------------------------------------- | ------------------------------------------------ |
| ``` [Firefly migration](www.Fireflymigration.com) ```   | [Firefly migration](www.Fireflymigration.com)    |
 
 
### Tables
```
Colons can be used to align columns.

| Tables        | Are           | Cool  |
| ------------- |:-------------:| -----:|
| col 3 is      | right-aligned | $1600 |
| col 2 is      | centered      |   $12 |
| col 1 is normal | are neat      |    $1 |

```



| Tables        | Are           | Cool  |
| ------------- |:-------------:| -----:|
| col 3 is      | right-aligned | $1600 |
| col 2 is      | centered      |   $12 |
| col 1 is normal | are neat      |    $1 |
