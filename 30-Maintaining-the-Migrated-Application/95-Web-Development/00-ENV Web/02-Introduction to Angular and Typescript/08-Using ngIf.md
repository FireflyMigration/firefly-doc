```csdiff
template:`
   <h1>{{ title }} ({{title.length}})</h1>
   <input [(ngModel)]="title">
+  <h2 *ngIf="title.length>15"> the title is long!!!</h2>
`
})
```
[Commit info on GitHub](https://github.com/FireflyMigration/ENV.Web/commit/e91512fc7896aee56905b2fc8cb840264e1f3db5?diff=unified)


<iframe width="560" height="315" src="https://www.youtube.com/embed/a_eKYNjFSoY?list=PL1DEQjXG2xnLvNcbYEN0lYoc7KLROIjeK" frameborder="0" allowfullscreen></iframe>
