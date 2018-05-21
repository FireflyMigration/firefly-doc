Many customers after completing the migration to.NET, wish to take their application to web and or mobile and are asking themselves what do we need to know, and how can we get there.

In this article, we try to relay our opinion on taking your application to the web.

Currently (May 2018) we believe that the best approach is a responsive web app that can work both on mobile devices and desktop web browsers. The technology is mature and is widely accepted. 

# Technologies
A web application typically has two parts, Server Side code, and Client Side code (code that runs in the browser)

## Server Side Code
For the Server-Side Code, we recommend that you'll use C# as the language and technologies such as  MVC.NET and WEB.API. This architecture will allow you to maximize your reuse of the migrated code in any web application that you'll write.

If you intend to deploy a production-ready application using these technologies we recommend that you'll get training on both these technologies from sources such as PluralSight etc...

#### ENV.Web
ENV.Web is an open source code sample that we wrote and we use in our demos, which allows you to easily reuse your migrated application on the server and expose rich data API's based on migrated code easily.

It is not designed as a comprehensive solution for all your server-side requirements, you'll need knowledge in MVC.NET to perform the operations you need that it doesn't yet provide.

ENV.Web is not a supported Firefly product, it's an open source library that you can download with its source and demos at https://github.com/fireflymigration/env.web

We believe it's fairly stable, but before using it in production, make sure that you also familiarize yourself with its code, in case you'll run into a bug you'll be able to quickly fix it.

## Client Side
You can use any client-side technology with .NET as the server side.
We use Angular (the technology) and Typescript (the coding language) to develop our web-based demos and solutions.
We use Visual Studio Code, as the IDE to do such development.

Angular is a great technology that once mastered, allows you to develop a web application with relative ease - but it requires training and expertise.

If you plan to develop a production ready solution, make sure that you get extensive training and expertise in these technologies.

# Web Tutorial
We have a web development tutorial on our doc site, that shows a speedy development of a web application using .NET as the server side technology and Angular as the client side technology. you can find it at !!!REplace with link!!!!

In that tutorial, we use an open source client-side library currently called radweb, this is an open source, non-firefly project that is at a very early stage (as of May 2018). If you plan to use it in production, use it at your own risk and be ready to work around bugs that it has by using other Typescript and angular libraries)

# Team Structure
If you are at the first few months after a migration to .NET, your developers may already be overwhelmed by learning .NET and learning another technology like Angular and Typescript may be too much at this time.

If you still want to go to the web fairly quickly we recommend that you split your team into two teams
### Server Side team 
Comprised of your migrated developers whom we trained in C#. They can and should write the server side code, that reuses the migrated code and any other server-side code should be relatively easy for them to write in C#. 
The developer's extensive application-specific knowledge and business know-how will be put to best use as they create REST API's that will expose the application data and logic to the front end.

### Client Side team (AKA Front End)
This team will write the Angular, Typescript, HTML and CSS code that will consume the server side REST API and provide a rich beautiful user experience.
These technologies are widely used, and developers who are fluent in them are easy to come by. These developers do not need in-depth application knowledge, as they'll rely on the knowledge of the Server Side team that will expose the API's for them.



# Mobile development
We think that the best approach for mobile development is to use web technologies. We think that native apps are relevant only when you need to do intensive device-specific features, like gaming. But for IT application web technologies will serve you well.
Even features like access to the camera and geolocation are currently accessible through javascript to any web application.
Also, today, you can develop fully functional offline applications using PWA for both Android and IOS and use offline storage such as Indexed DB that exist in any browser.
We believe that using the same technology (and code) for both web and mobile reduces your development costs.

This web applications do not require any installation and can be deployed to customers using a simple link.

If at a later time you wish to deploy the application as an app in the store and want it to run natively, you can always use PhoneGap to run that application natively.

If you still choose to use native technologies, we recommend that you'll look into Xamarin - which allows you to create mobile native apps using .NET while sharing the maximum amount of code between the different platforms. 