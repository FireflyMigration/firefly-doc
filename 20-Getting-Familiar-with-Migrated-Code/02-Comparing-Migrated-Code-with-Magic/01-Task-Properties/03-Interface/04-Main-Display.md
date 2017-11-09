# Main Display

This Option determines which screen to display based on a numeric value obtained by an expression.  

Name in Migrated Code: **See example**
Location in Migrated Code: **OnLoad Method**  

Example:  
```csdiff
protected override void OnLoad() {

   // other code
   switch ((int)(u.If(vEnglish, 2, 1)))
   {
       case 1:
            View = new UI.OtherLang_UI(this);
            SetMainDisplayIndex(1);
            break;
        case 2:
            View = new UI.English(this);
            SetMainDisplayIndex(2);
            break;
    }
}
```