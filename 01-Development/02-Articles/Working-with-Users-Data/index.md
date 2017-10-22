keywords: user, role, group, security, right

## Working with Users Data ##
Once the migration is completed you may want to access the security data or manipulate users information.
This article explains how to work with the models under ENV.Security namespace.

Note: the actual data is stored and encrypted in the security file, which is usually located in the working directory.

All the logic code of users and roles can be found in the ENV project, under the Security namespace. The main class that is used to manipulate users data is the UserManager.
Assuming that we want to export all the usernames to a text file, let's add a new method to the UserManager class.

```cs
public static void MyExport()
{
    using (var sw = new StreamWriter(@"c:\temp\users.txt"))
    {
        ChangeUserFile(storage =>
        {
            var users = new Entities.Users(storage.GetDb());
            var bp = new BusinessProcess { From = users };
            bp.ForEachRow(() =>
            {
                sw.WriteLine(users.UserName);
            });

            return false;
        });
    }
}
```

Notice:

* When creating the instance of the Users entity, we should provide the database.
* Using the ChangeUserFile method gives us access to the Database of the security entities.
* At the end of our code we return false. This means we don't want to save any changes to the database. In case you make changes that need to be saved, you should return true.