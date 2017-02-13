# Important notes:

**ApplicationCore class**

Whenever we call a UIController or BusinessProcess from a migrated application, which wasn’t called before in this request – it’ll also load that controller’s “ApplicationCore” class and perform it’s “OnStart” event.  
It assumes that the “OnStart” of the “ApplicationCore” performs general initialization code that is required for all of it’s controllers.  
So when you reuse code from a windows forms application for the first time in a web application, be mindful to the code that exists in the “ApplicationCore” “OnStart” and disable code that is not relevant in this case.  

**UIController Behavior in web projects**

In the setup article, we’ve called the following method for each request:  
![](content_Current_setNonUIThred.png)

This means that if your code reaches a UIController and runs it – it’ll run, perform the “OnStart” and “OnEnterRow” and then behave as if the user pressed escape immediately.

This may have to potential of animating the UIController from a web project – but has many pitfalls to it – so it’s not supported 

I suggest you use the approach of refactoring code out of the UIController and then reusing it whenever you need an existing logic from it.