keywords:direct sql, stored procedure, idbcommand, idbconnection, executeReader

Most of the dataacess is done using Entities. If you want to do direct sql's you can use the Dynamic SQL entity see:[How to use DynamicSQLEntity](http://localhost:8083/dynamic-sql-entity.html).

If you want to do special things, or go to the low level database api you can use `System.Data.IDBCommand`


```csdiff
using (var command = Shared.DataSources.Northwind1.CreateCommand())
{
    command.CommandText = "Select * from customers where city = @city";
    var dbParameter = command.CreateParameter();
    dbParameter.ParameterName = "@city";
    dbParameter.Value = "Berlin";
                    
    command.Parameters.Add(dbParameter);
    using (var reader = command.ExecuteReader())
    {
        while (reader.Read())
        {
            for (int i = 0; i < reader.FieldCount; i++)
            {
                Debug.Write(reader[i]);
                Debug.Write(", ");
            }
            Debug.WriteLine("");
        }
    }
}
```
<iframe width="560" height="315" src="https://www.youtube.com/embed/Nahq4S73UeU" frameborder="0" allowfullscreen></iframe>