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
5. Flow Mode Expand Before + Expand After
6. Blocks

