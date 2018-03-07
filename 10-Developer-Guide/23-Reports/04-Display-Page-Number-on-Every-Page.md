Keywords:batch, businessprocess, report, page 

# Displaying the page number and date


<iframe width="560" height="315" src="https://www.youtube.com/embed/ZzkFcwA9WKY?list=PL1DEQjXG2xnLss44EgCJq1bAM-Blgf2jd" frameborder="0" allowfullscreen></iframe>

---

First let's add two methods that will provide us with the page number and todays's date:
```csdiff
+public Number Page() => _Printer.Page;      
+public Date CurrentDate() => Date.Now;
```

In the layout designer use the column wizard to add the methods to the layout


