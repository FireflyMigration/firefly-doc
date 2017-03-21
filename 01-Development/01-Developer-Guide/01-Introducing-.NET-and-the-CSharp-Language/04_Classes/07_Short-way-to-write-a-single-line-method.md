# Short Way to Write a single line method 

```csdiff
-public void DescribeYourself()
-{
-   MessageBox.Show(this.Name + " is a " + this.AnimalType + " and it's id is:" + Id);
-}
+public void DescribeYourself() => MessageBox.Show(this.Name + " is a " + this.AnimalType + " and it's id is:" + Id); 
```
---
<iframe width="560" height="315" src="https://www.youtube.com/embed/7FtYDnRnbg8?list=PL1DEQjXG2xnKI3TL-gsy91eXbh3ytOt6h" frameborder="0" allowfullscreen></iframe>
