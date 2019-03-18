Sometimes when we have webservices we want to test a series of web services with data that is transferred between them.

For example – we have a service that we want to call - but before it we need to call another service to login and get a session id.  
We need to define:

1.	The call to the first service [Test_Login]

*Request* 
```xml
<bon:Test_Login>
    <bon:piUserId>Virginie</bon:piUserId>
    <bon:piPassword>123456</bon:piPassword>
</bon:Test_Login>
```
*Response*  
```xml
<wn0:Test_LoginResponse>
    <wn0:response >
        <wn0:SessionId>922486967</wn0:SessionId>
    </wn0:response>
</wn0:Test_LoginResponse>```

2.	Extract the session from the response and inject the session to the next service request 
![](2019-03-18_13h51_32.png)

3.	Run the next service request.

## SoapUI with properties

To make it easier we’ll set some properties that we can share and reuse throughout our test case.

1.	Define a test case [Test_Login]
```xml
<bon:Test_Login>
    <bon:piUserId>Put a property here</bon:piUserId>
    <bon:piPassword>Put a property here</bon:piPassword>
</bon:Test_Login>
```
2.	Define the properties : login and password  
![](2019-03-18_14h10_05.png)
3. Use the properties into the request `${Properties_title#properties_name}`
```xml
<bon:Test_Login>
    <bon:piUserId>${Properties#Login}</bon:piUserId>
    <bon:piPassword>${Properties#Login}</bon:piPassword>
</bon:Test_Login>
```

