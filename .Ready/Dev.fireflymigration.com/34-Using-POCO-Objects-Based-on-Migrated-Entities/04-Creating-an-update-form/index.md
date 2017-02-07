# Creating an update form

Next we want to allow the user to update an existing customer. We’ll show a very basic example focusing on the wiring  (there are obviously ways to improve it to have better security etc)…but the goal is to show you how can it be done simply.

We’ll start by creating a single customer display. To do that we’ll add the following method to the CustomersController:  
![](ActionResult_details.png)  

Note that it uses the same principles as before, but now it filters on a single customer using the “Where” and sends it to the View.