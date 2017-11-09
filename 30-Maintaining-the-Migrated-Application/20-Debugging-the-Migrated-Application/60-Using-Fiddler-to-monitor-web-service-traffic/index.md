# Using Fiddler to monitor web service traffic

To capture Web Service traffic in Fiddler, we need to modify the INI file to route the request via Proxy.

Please add the following to the INI file under [MAGIC_ENV]:

**HTTPProxyAddress = 127.0.0.1:8888**

Make sure that Fiddler also uses this port  Tools-> Telerik Fiddler Options-> Connections Tab

For more information, please see: [telerik.com](http://www.telerik.com/blogs/capturing-traffic-from-.net-services-with-fiddler)

 