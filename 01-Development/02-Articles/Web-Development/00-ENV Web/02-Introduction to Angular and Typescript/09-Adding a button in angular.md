
```csdiff
template:`
  <h1>{{ title }} ({{title.length}})</h1>
  <input [(ngModel)]="title">
  <h2 *ngIf="title.length>15"> the title is long!!!</h2>
+ <button (click)="click()">my button</button>
  
`
})
@Injectable()
export class AppComponent {
  
    title = 'the title';
+    click() {
+        this.title += "button was clicked";
+    }
}
const apiUrl = '/dataApi/'; 
```

[Commit info on GitHub](https://github.com/FireflyMigration/ENV.Web/commit/dfdf33d70cb71521e138468c954a7872547644ba?diff=unified)

<iframe width="560" height="315" src="https://www.youtube.com/embed/KuVuxwgnno4?list=PL1DEQjXG2xnLvNcbYEN0lYoc7KLROIjeK" frameborder="0" allowfullscreen></iframe>
