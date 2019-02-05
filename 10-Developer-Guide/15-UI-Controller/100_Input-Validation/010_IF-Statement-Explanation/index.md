In this page we'll
* Explain more about the if statement
* Demo single and multi line if statement
* Discuss the different bool operator

| Operators | Explanation  |Example
|:---------:|--------------|-----
|**==**|Equals| a == "London"
|**!=**|No Equals, different| a != "London"
|**>**|Greater Than| n > 5
|**<**|Less Than| n < 7
|**<=**|Less or Equal| n <= 6
|**>=**|Greater or Equal| n >= 7
|**&&**|And| n > 5 && a == "London"
|**\|\|**|Or| n < 7 \|\| a !="London"
|**!**| Not | !(n < 7)


```csdiff
protected override void OnSavingRow()
{
+   if (Orders.OrderDate.Year < 1990 || Orders.OrderDate.Year>2020)
        Message.ShowError("Invalid Year");
}
```
---

<iframe width="560" height="315" src="https://www.youtube.com/embed/ILv1m8NA2sM?list=PL1DEQjXG2xnL1VKb5GvdDwxJeym7Uj6S3" frameborder="0" allowfullscreen></iframe>
