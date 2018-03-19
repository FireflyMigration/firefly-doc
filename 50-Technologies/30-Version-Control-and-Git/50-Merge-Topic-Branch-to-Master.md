When working with Git, usually a task like a bug fix or a feature is done on a topic branch.  \
Once the work is completed and the branch was tested, it is time to merge the work to the master branch.
Here are the steps to do it in a safe manner:
1. Make sure your master branch is up-to-date and pull if needed.

2. Create a temp branch from master.
   1. Right-click the branch name at the bottom right corner of Visual Studio and select "New Branch..."
3. Merge the topic brahcn to into the temp branch
   1. Right-click the branch name at the bottom-right corner of Visual Studio and select "Manage Branches"
   2. Right-click the branch name and select "Merge From..." and select the topic branch from the drop-down list   
   3. Visual Studio will try to merge the work from the topic branch into the temp branch which is equivalent to the master branch. If all goes well, the changes will be committed. In some cases, you might have conflicts. Don't worry, just compare the files and resolve the conflict manually. 
4. Once all conflicts are resolved, check the list of files that are going to be committed and make sure they are the correct files.
5. Commit the merge with an appropriate message like "Merge Fix1234 into master". (Yes we are actually merging into temp, but it will be in master in a bit.)
6. Build the temp branch and test 
7. Switch to master branch and merge the temp branch into master.
8. Build the master branch and test
9. Once tested and ready, push your master branch to Git server.
10. Test again using the server.
11. Remove the temp branch
