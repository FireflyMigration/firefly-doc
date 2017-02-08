FlowUIController is a controller where the tab order is managed by the Columns collection and not by the controls on the form.

It also allows you to inject logic that will be executed when you move between these controls


## Flow.Add

Commands that are added using Flow Add will be executed based on their position relative to the Columns Collection.
The flow is executed line by line according to the column collection and the flow.Add commands respectively.
The Flow will also get executed when you leave a changed row - based on your position in the column collection.

See the video

2. Condition

## Using Flow.Add to perform input validation
Keywords:ShowError,FlowAbortException

To prevent the user from proceeding in the flow or leaving the screen use ShowError or FlowAbortException

3. Direction
2. Flow Mode TabOrSkip
## Flow Mode Expand Before + Expand After
Expand before and expand after are widely used in code that was migrated from Older version of magic, 9, 8 etc....
It's common usages are:
* Next to a code columns (for example customer Id) - to allow the user to select a customer.
* Next to a column that is bound to a button on the screen. That button than raises the Expand event which in turn will code the code next to it in the flow using ExpandAfter or ExpandBefore
* Next to columns that are bound to TabControls. When ever a tab changes - it automatically fires the expand event which then runs the code in the flow with ExpandBefore and ExpandAfter


6. Blocks

