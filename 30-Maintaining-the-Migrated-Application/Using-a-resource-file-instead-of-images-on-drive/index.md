keywords:embedded images, embedded resources

`ENV\Utilities\ImageLoader.cs`
```csdiff
namespace ENV.Utilities
{
    public class ImageLoader
    {
+       public static System.Resources.ResourceManager ResourceManager;
        public static Image Load(string filePath, Size preferredSize)
        {
            if (filePath.StartsWith("@"))
            {
                filePath = filePath.Substring(1).TrimEnd();
                var i = filePath.LastIndexOf('.');
                if (i == -1) return null;
                var img = LoadNativeResource(filePath.Substring(0, i) + ".dll", filePath.Substring(i + 1));
                if (img is Icon) return ((Icon)img).ToBitmap();
                else return img as Image;
            }
            

            
+           if (ResourceManager != null)
+           {
+               //System.Diagnostics.Trace.WriteLine(filePath);
+               var key = System.IO.Path.GetFileNameWithoutExtension(filePath).Replace("-","_");
+               //System.Diagnostics.Trace.WriteLine(key);
+               object obj = ResourceManager.GetObject(key);
+               if (obj != null)
+                   return ((System.Drawing.Bitmap)(obj));
+           }

            if (!System.IO.File.Exists(filePath)) return null;

            var extention = Path.GetExtension(filePath).ToUpper(CultureInfo.InvariantCulture);
            if (extention == ".PCX")
                return LoadPcx(filePath);
            if (extention == ".ICO")
                return new Icon(filePath, preferredSize).ToBitmap();

            return Image.FromStream(new MemoryStream(File.ReadAllBytes(filePath)));
        }
```


`program.cs`
```csdiff
{
    System.Windows.Forms.Application.EnableVisualStyles();
    System.Windows.Forms.Application.SetCompatibleTextRenderingDefault(false);
+   ENV.Utilities.ImageLoader.ResourceManager = Northwind.Properties.Resources.ResourceManager;
    ENV.UserSettings.Version10Compatible = true;
    Text.StopProcessingFormatOnCharF = true;
    ENV.Data.DateColumn.GlobalDefault = new Date(1901,1,1);
    ENV.Commands.SetDefaultKeyboardMapping();
    ENV.Commands.SetVersion10CompatibleKeyMapping();
    ENV.Common.ApplicationTitle = "Northwind";
    ENV.UserSettings.FixedBackColorInNonFlatStyles = true;
    ENV.UserSettings.InitUserSettings("Northwind.ini", args);
}
```


<iframe width="560" height="315" src="https://www.youtube.com/embed/FUQsThCgZAk" frameborder="0" allowfullscreen></iframe>