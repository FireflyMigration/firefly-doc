# Reporting an issue after the final migration

Once the application is deployed and you have switched to .Net,  
the users might come across new issues.  
Some of them might stem from new code added to the application,  
and some might be differences between Magic and .Net that  
were not tested in the Alpha / Beta phases.

In order to report such an issue please check the following:  
1. Test the same scenario using the code straight out of the migration server.
In case the problem is reproducible using this version as well, please report it using the issue tracker
(don't forget to mention that you are using the latest version from the migration server) 
2. In case the problem is not manifested using the latest version from the migration server,
please try migrating using your "final migration" version.
The version is indicated in the status bar (the last 5 digits) - on the FTP rename the Start.Done file
to Start.[version]
3. In case the problem is reproduced using the final migration, it means the problem is in the ENV / Firefly.Box  
code but was already fixed, so all you need to do is replace the copies of ENV and Firefly.Box with a fresh one.
In order to do that just follow the instructions in [this](http://doc.fireflymigration.com/getting-the-update-migrated-code.html) article. 
In case it is not reproduced using the code from the migration server (with the "final migration" version)  
it means that changes made in the code are manifesting this problem.  

Options you might consider when investigating this issue:  
1. Using a comparing tool (for example [Beyond Compare](https://www.scootersoftware.com/))
to track down the differences in your code between the version from the migration server  
and the version you have. To narrow down the search, just compare the pieces of code that actually take part
of the problematic scenario.
2. In case you are using a version control, return to previos versions  
of the code until the problem is not manifested anymore. 