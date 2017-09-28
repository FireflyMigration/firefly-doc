Add an Angular component using the Template in the ENV.Web folder.

Register the component in the app.module.ts file
```csdiff
import { RouterModule, Routes } from '@angular/router';
import { Categories } from './Categories';
+import { Orders } from './Orders';
  
var app = new utils.AppHelper();
app.Register(Categories);
+app.Register(Orders);
```
[Commit info on GitHub](https://github.com/FireflyMigration/ENV.Web/commit/c29791278829f3babf00ac5cc0f61ab2c83229fd)
<iframe width="560" height="315" src="https://www.youtube.com/embed/VcYrLb8qlQ8?list=PL1DEQjXG2xnJOSQf2421r1S040NkvCApp" frameborder="0" allowfullscreen></iframe>
