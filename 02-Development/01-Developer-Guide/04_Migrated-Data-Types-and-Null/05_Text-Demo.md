# Text - Demo

```csdiff
using Firefly.Box;
using System.Diagnostics;

namespace Northwind.Training
{
    class DemoText
    {
        public void Run()
        {
            string s1 = "a";
            string s2 = "a  ";
            Text t1 = "a";
            Text t2 = "a  ";
            if (s1 == s2)
                Debug.WriteLine("Strings are equal");
            else
                Debug.WriteLine("Strings are not equal");
            if (t1 == t2)
                Debug.WriteLine("Texts are equal");
            else
                Debug.WriteLine("Texts are not equal");
        }
    }
}

```

---

<iframe width="560" height="315" src="https://www.youtube.com/embed/DjwuAwkDuC4?list=PL1DEQjXG2xnJNTIi_lrTxD83bf5-8mrRP" frameborder="0" allowfullscreen></iframe>




