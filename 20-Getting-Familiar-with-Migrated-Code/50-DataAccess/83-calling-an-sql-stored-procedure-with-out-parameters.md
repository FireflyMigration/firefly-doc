Here's a code sample of how to call an SQL server stored procedure that uses out parameters.

Here's the stored procedure code, based on [a question in our forum](https://groups.google.com/forum/?nomobile=true#!topic/migrated-by-firefly/kP-CrhJ_EP4)

```SQL
CREATE PROCEDURE [dbo].[Test] @Ret int input output     
AS
BEGIN
    set @Ret =@Ret + 7
END
```

We use a direct call to the database, based on the article [Accessing the database directly](accessing-the-database-directly.html)


```csdiff
var valueWeWantToSendToTheStoredProcedure = new NumberColumn();
valueWeWantToSendToTheStoredProcedure.Value = 4;
using (var c = Shared.DataSources.Northwind.CreateCommand())
{
    c.CommandText = "Test";
    c.CommandType = System.Data.CommandType.StoredProcedure;

    var ret = c.CreateParameter();
    c.Parameters.Add(ret);
    ret.ParameterName = "@ret";
    ret.Direction = System.Data.ParameterDirection.InputOutput;
    // setting the database type is optional, usually that type is inferred from the value that is set
    ret.DbType = System.Data.DbType.Int32;

    // we use the `ToObject` method to convert Firefly types (Number,Text,etc...) to DB Types (int,decimal,string etc...)
    ret.Value = u.ToObject(valueWeWantToSendToTheStoredProcedure);
    c.ExecuteNonQuery();
    // this line is used for testing - to demo that we got the value we wanted
    ret.Value.ShouldBe(11);
}
```