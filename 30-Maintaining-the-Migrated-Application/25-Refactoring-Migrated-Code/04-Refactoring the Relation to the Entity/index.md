keywords: refactor, refactoring,relation,entity


The relation filter (Where clause) has often more than one condition:

```csdiff
void InitializeDataView()
        {
         Relations.Add(Company_Accounts,
                Company_Accounts.MasterId.IsEqualTo(MasterfileID).And(
          		Company_Accounts.AccountId.IsEqualTo(AccountID)), 
            Company_Accounts.SortByCompany_Accounts_By_Master_Acct);
        }
```

It becomes a challenge when this is a common relation which you code occasionally especially if the filter contains more conditions.  
A good practice will be to refactor the code to the Entity (Company_Accounts) so the next time you will need to add a relation, it will much easier.


We will first refactor the relation locally and then move it to the Entity.


**Refactor the filter to a method**


```csdiff
void InitializeDataView()
        {
+           Relations.Add(Company_Accounts, GetCompany(),
                Company_Accounts.SortByCompany_Accounts_By_Master_Acct);
        }

+       private FilterBase GetCompany()
+       {
+         return Company_Accounts.MasterId.IsEqualTo(MasterfileID).And(
+                            Company_Accounts.AccountId.IsEqualTo(AccountID));
+       }
```

**Refactor the filter parameters**
```csdiff
void InitializeDataView()
        {
           Relations.Add(Company_Accounts, GetCompany(),
                Company_Accounts.SortByCompany_Accounts_By_Master_Acct);
        }

       private FilterBase GetCompany()
       {
+         Types.MasterfileId MasterfileID1 = MasterfileID;
+         Types.AccountId AccountID1 = AccountID;
+         return Company_Accounts.MasterId.IsEqualTo(MasterfileID1).And(
+                            Company_Accounts.AccountId.IsEqualTo(AccountID1));
       }
```
**Set the method parameters**

```csdiff
void InitializeDataView()
        {
+          Relations.Add(Company_Accounts, GetCompany(MasterfileID,AccountID),
                Company_Accounts.SortByCompany_Accounts_By_Master_Acct);
        }

+      private FilterBase GetCompany(Types.MasterfileId MasterfileID1,Types.AccountId AccountID1)
       {
         return Company_Accounts.MasterId.IsEqualTo(MasterfileID1).And(
                            Company_Accounts.AccountId.IsEqualTo(AccountID1));
       }
```

**Move the method to the Entity**
```csdiff
public class Company_Accounts : Entity 
    {
        .
        .
        .
        public Company_Accounts() : base("Company_Accounts", "Company_Accounts", Shared.DataSources.SQL)
        {
            Cached = false;
            InitializeIndexes();
        }
        public FilterBase GetCompany(Types.MasterfileId i_MasterfileID1, Types.AccountId i_AccountID1)
        {
+           return this.MasterId.IsEqualTo(i_MasterfileID1).And(
+                               this.AccountId.IsEqualTo(i_AccountID1));
        }
        .
        .
        .
        void InitializeIndexes()
        {
         .
         .
         .
        }
    }
```
```csdiff
void InitializeDataView()
        {
+          Relations.Add(Company_Accounts, Company_Accounts.GetCompany(MasterfileID,AccountID),
                Company_Accounts.SortByCompany_Accounts_By_Master_Acct);
        }
```


1) Change the method from `Private` to `Public`
2) Add `using Firefly.Box.Data.Advanced;` for the `FilterBase`
3) Remove the Entity name from the column or Change it to `this`
4) Add Entity name prefix to the `GetCompany` method


**Refactor Filter to Relation**

You can continue and refactor the filter to a relation and make the code even easy to work with especially when you have many occurrences it the code of the same filter.
```csdiff
public class Company_Accounts : Entity 
    {
        .
        .
        .
        public Company_Accounts() : base("Company_Accounts", "Company_Accounts", Shared.DataSources.SQL)
        {
            Cached = false;
            InitializeIndexes();
        }
        public FilterBase GetCompany(Types.MasterfileId i_MasterfileID1, Types.AccountId i_AccountID1)
        {
           return this.MasterId.IsEqualTo(i_MasterfileID1).And(
                               this.AccountId.IsEqualTo(i_AccountID1));
        }
+       public Relation CompanyRelation(Types.MasterfileId i_MasterfileID1, Types.AccountId i_AccountID1)
+       {
+           return new Relation(this, GetCompany(i_MasterfileID1, i_AccountID1), this.SortByComany_Accounts_By_Master_Acct);
+       }
        void InitializeIndexes()
        {
         .
         .
         .
        }
    }
```

I created another method inside the Entity which returns a `Relation` object  which I will use in my new relation.  
Notice that I also refactored the sorting.

```csdiff
void InitializeDataView()
        {
+          Relations.Add(Company_Accounts.CompanyRelation(i_MasterfileID, i_AccountID));
        }
```

