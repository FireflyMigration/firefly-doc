# Short Way to Write a single line method 

```csdiff
using System.Windows.Forms;

namespace Northwind.Training
{
    class Animal
    {
        static int LastUsedId = 0;
        public readonly int Id;
        public string Name;
        public string AnimalType;
        public Animal()
        {
            LastUsedId++;
            Id = LastUsedId;
            Name = "No name was given";
            AnimalType = "No type was given";
        }
-       public void DescribeYourself()
-       {
-           MessageBox.Show(this.Name + " is a " + this.AnimalType + " and it's id is:" + Id);
-       }
+       public void DescribeYourself() => MessageBox.Show(this.Name + " is a " + this.AnimalType + " and it's id is:" + Id); 
 
    }
}
```

<iframe width="560" height="315" src="https://www.youtube.com/embed/7FtYDnRnbg8?list=PL1DEQjXG2xnKI3TL-gsy91eXbh3ytOt6h" frameborder="0" allowfullscreen></iframe>
