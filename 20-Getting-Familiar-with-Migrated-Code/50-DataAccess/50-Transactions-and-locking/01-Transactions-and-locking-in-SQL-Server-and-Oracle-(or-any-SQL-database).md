# Transactions and locking in SQL Server and Oracle (or any sql database)

In this video we explain how database locking works and the scope of database transactions - as the basis for a deeper locking and transactions discussion on migrated code and .NET

---
<iframe width="560" height="315" src="https://www.youtube.com/embed/FRs6tDVk-FY?list=PL1DEQjXG2xnKSd0Q-_NVh7KZzGRxxHcHc" frameborder="0" allowfullscreen></iframe>


## SQL Server Query to show locked tables and their users
```
SELECT 
     OBJECT_NAME(rsc_objid,rsc_dbid) 'TableName',
	 b.program_name,b.host_name,b.host_process_id , b.login_name ,b.session_id
FROM master.dbo.syslockinfo a left outer join sys.dm_exec_sessions b on a.req_spid=b.session_id 
WHERE  req_spid>=0 AND rsc_objid>0 AND rsc_type=5
```
