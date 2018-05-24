
>"Every piece of knowledge must have a single, unambiguous, authoritative representation within a system"

*Andy Hunt and Dave Thomas, The Pragmatic Programner*

# Introduction
Don't Repeat Yourself (DRY) is a basic principle in software development.

# Why we duplicate?
  ## Using the same View with Different Data
  ## Using the same Data with Different View  
  ## Backup before a big change
  ## It's too easy 
Writing code from scratch can be difficult or irritating. Coping a pre-written solution can be used as the basis for solving the current problem.
When the tools make it easier to copy code than to reuse it, the latter becomes the popular choice. Magic falls exactly in this category. Coping a complete program which include the view in it can be done with a few clicks, while using the same view with different data is a headech.

# Why is it Bad?
    
# What Can we do Instead?

# When is it OK to Copy?
## This is the second time you write the same thing
Somtimes it's hard to see the general solution before you have more than one concrete example.
We sometimes write the same thing twice before we understand what parts of the program are variables that need to be external and all that is left, the common code, is usually the general solution.