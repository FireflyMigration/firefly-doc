### Setting the KeepViewVisibleAfterExit
1.	Assuming that we want the user to navigate on the left screen and see the related details on the right screen, we need to add the following code to the `ShowOrderDetailsChild` controller:
```diff
protected override void OnLoad()
        {
+           Exit();
+           KeepViewVisibleAfterExit = true;    
            View = () => new Views.ShowOrderDetailsChildView(this);
        }
```  
2.	Run the application and notice the following when opening this screen:
    a.	As soon as we enter the screen we can see both the ShowOrdersParent and the `ShowOrderDetailsChild`, **but now the focus is on the left screen**, which means that we **already exited the `ShowOrderDetailsChild`** by calling the `Exit` method.
    b.	However, ``we can still see the `ShowOrderDetailsChild` screen`, as its `KeepViewVisibleAfterExit` is set to `true`.
    c.	When we navigate on the left screen, the right screen show the related data as expected.
