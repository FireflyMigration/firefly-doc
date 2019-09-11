keywords: MLS, translate, language

The migrated code has many options to translate applications from one language to another.

By default it supports all the MLS functionality of the original application, but the architecture was designed to be extended a lot further.

#Basic Usage
To use multilangual support, you'll a translation file, this file is a simple text file that each "odd" line has the text in the developer's langulage, and each "even" line has that same text in the target langulage

For example:
###french.mls
```csdiff
Hello World
Bonjour le monde
We can do a lot more with the migrated code
Nous pouvons faire beaucoup plus avec le code migré
```
And you can have the same file for German:
###german.mls
```csdiff
Hello World
Hallo Welt
We can do a lot more with the migrated code
Mit dem migrierten Code können wir noch viel mehr tun
```

These langulages should be defined in the ini file, as follows:
```csdiff
[MAGIC_LANGUAGE]
French = french.mls
Gernal = german.mls
```

And the specific language to use, is determined by `StartingLanguage` tag:
```csdiff
StartingLanguage = French
```

# How does it work
The entire implementation of Multilingual support is actually quite simple, it's implementation is in a class called '

#build_mls.exe
build_mls.exe was a utility used in magic to add some info to a translation file that magic used internally.
The migrated code **does not** need the build_mls.exe - and can work with the original translation file.