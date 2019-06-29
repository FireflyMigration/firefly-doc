# Using POCO Objects Based on Migrated Entities

This article is a part of a series of articles about reusing code from a migrated project in a web project.

To configure and setup an MVC application that reuses migrated code, see Setting up an MVC project that reuses migrated code

Next I recommend you read the following articles in the following order:

1. Creating my first MVC page
2. Using POCO Objects Based on Migrated Entities  – this article
3. Poco Creator–automatically create poco object based on entities, (T4 Templates)
4. Poco Creator, next step–extending the generated objects
5. Reusing Migrated Reports on the Web

The data access in a migrated application is done using the Entity classes, which are placed in the Models namespace.

Sometimes, we would like to use simple .NET objects which we’ll load from the DB and save to the DB, using the migrated entities to control that data access.

In this article, I’ll explain the basic mechanics and use cases of it, and in following articles, I’ll show some shortcuts, and special cases that can be used.