


```csdiff
@Component({
    template:`
-<h1>Orders </h1>
+ <h1>{{ title }} ({{title.length}})</h1>
+ <input [(ngModel)]="title">
`
})
  
@Injectable()
export class Orders  {
+    title = 'the title';
}
const apiUrl = '/dataApi/'; 
```
[Commit info on GitHub](https://github.com/FireflyMigration/ENV.Web/commit/4ba0b29708d42adddb8358eee772b1d8c44ba1df?diff=unified)



<iframe width="560" height="315" src="https://www.youtube.com/embed/6Uk8Vz25z6Y?list=PL1DEQjXG2xnJOSQf2421r1S040NkvCApp" frameborder="0" allowfullscreen></iframe>
