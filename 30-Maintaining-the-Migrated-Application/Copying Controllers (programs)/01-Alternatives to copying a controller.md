
>"Every piece of knowledge must have a single, unambiguous, authoritative representation within a system"

*Andy Hunt and Dave Thomas, The Pragmatic Programner*

# Introduction
Don't Repeat Yourself (DRY) is a basic principle in software development. No matter the language or the technology, code duplication can lead to a maintenance nightmare.
However, many applications contain code duplications and Magic applications are no exception.
In this article we'll suggest some alternatives to tasks that were commonly achieved by duplicating programs in Magic.

# Why Duplication is Bad?
Programming is mostly about maintenance. It's easy to copy and paste code when creating a new feature, but 80% of the time will be spent on the maintenance of the features, either fixing bugs or changing requirements.

Code duplication creates a 'technical debt' for the future. Any change you ever need to make in the code will now be twice as expensive. Moreover, it is more risky that you will forget one of the places that need to be changed, which will make your work even harder.

Keeping the logic in one place and expressing everything only once, makes it easier to change it when needed (and it will be needed sooner or later).


# Why We Duplicate?
Here are some common scenarios for code duplication in Magic:
  ## Using the same View with Different Data
Assuming that we have a screen with a special design, or many controls and we want the same screen to be used with different logic.
For example, a screen that let the user define many filtering options before running a report. In Magic the program screen is consolidated with the business logic, which makes it difficult to reuse the screen.
The common solution is to copy the program and remove everything from it except the screen, so that we can use the screen with different data and logic.
  ## Using the same Data with Different View  
As opposed to the previous example, we sometimes have a big program with lots logic code and we want to display a different screen to the user.
This can be very common task in a multi-lingual applications. Magic allows us to create more than one screen in the same program, but each screen is very coupled to the logic of the program and this not always fit for the purpose.
  ## Backup before a big change
Perhaps the most common reason for coping a program in Magic is for backup. Even if you've used source control, it was sometimes a habit to copy a program before changing the code, just in case...
Almost every Magic application has these copies, usually at the end of the program repository, usually with a name that implies that these are temporary programs, which means they are going to be there forever :).

  ## It's too easy 
Writing code from scratch can be difficult or irritating. Coping a pre-written solution can be used as the basis for solving the current problem.
When the tools make it easier to copy code than to reuse it, the former becomes the popular choice. Magic falls exactly in this category. Coping a complete program which include the view in it can be done with a few clicks, while using the same view with different data is a headache.

# How Can We Do Better in .NET?
We have a set of videos that explain how to reuse a controller or a view in the migrated application, which you can find [here](http://doc.fireflymigration.com/creating-reusable-views-and-controllers.html).  
It also helps that coping a program in .NET is not so easy as it was in Magic. However, if you are still not convinced and have a good reason to duplicate a program, we have a few videos that explains how, which you can find [here](http://doc.fireflymigration.com/duplicating-controllers.html).


# When is it OK to Copy?
As with any rule, taking it to the extreme can be harmful and cause other problems. So here are a few scenarios when you can copy code without feeling bad about it:
## Throwaway code
There are some cases where we need to write code that is going to be thrown away. Let's be clear here, that is code that you know for sure will get thrown away.
For example, when you exploring with a new feature, writing some trial and error code, until you decide on the final design.
 In unit tests, there is the concept of 'scaffolding tests', which are tests we write early when the solution is not clear enough, than remove them when other tests are being written.

## This is the second time you write the same thing (then generalize it)
Sometimes it's hard to see the general solution before you have more than one concrete example.
We sometimes write the same thing twice before we understand what parts of the program are variables that need to be external and all that is left, the common code, is usually the general solution.
