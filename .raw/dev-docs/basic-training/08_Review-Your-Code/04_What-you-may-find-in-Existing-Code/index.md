### What you may find in Existing Code


**Reading the code from the beginning of the program.**

* **1.1 AllowUserAbort**
  
  The magic default is true which is wrong				

* **1.2 SilentSet**
    1. SilentSet is an update that doesn't force the `OnSavingRow` (does not mark the row as changed).
    2. If the SilentSet is the only change to the row, nothing will be saved. However, if the SilentSet is done together with another regular update of any other column, both changes will be saved.

* **1.3	CheckExit**
      
    1. When the ExitTiming of the controller is AsSoonAsPossible, the exit condition is being evaluated a lot.
    2. To support the same behavior of the original application and to project when the exit condition is being evaluated, the migrated code contains calls to the CheckExit method.
    3. This allow you to reconsider the use of this ExitTiming and control when the CheckExit should be evaluated.

* **1.4	NotifyRowWasFound**
    
    1. In magic, the only way to know if the relation has found a matching row, is by returning the success indication to a virtual column and check the column’s value. This is implemented in .NET using the `NotifyRowWasFound` method of the relation object.
    2. In new code you don’t need to use a local column for this purpose. Instead use the RowFound property of the relation object and check its value.

* **1.5	LockCurrentRow**

    1. This method locks the current row for all the entities which has the AllowRowLocking set to true.
    2. This lock occurred in magic behind the scenes and in the migrated application it is very clear where a lock is performed so that you’ll be aware of this behavior and decide if the lock is really needed.

* **1.6	DeltaOf**
    
    1. This method returns the delta between the value of the columns before the EnterRow and the current value. This is useful for maintaining a grand total in a form.
    2. This is part of the .NET implementation of the incremental update in magic.
