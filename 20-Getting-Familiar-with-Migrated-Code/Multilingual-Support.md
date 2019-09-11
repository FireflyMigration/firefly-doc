keywords: MLS, translate, language

The migrated code has many options to translate applications from one language to another.

By default, it supports all the MLS functionality of the original application, but the architecture was designed to be extended a lot further.

# Basic Usage
To use multilingual support, you'll a translation file, this file is a simple text file that each "odd" line has the text in the developer's language, and each "even" line has that same text in the target language

For example:
#### french.mls
```csdiff
Hello World
Bonjour le monde
We can do a lot more with the migrated code
Nous pouvons faire beaucoup plus avec le code migré
```
And you can have the same file for German:
#### german.mls

```csdiff
Hello World
Hallo Welt
We can do a lot more with the migrated code
Mit dem migrierten Code können wir noch viel mehr tun
```

These languages should be defined in the ini file, as follows:
```csdiff
[MAGIC_LANGUAGE]
French = french.mls
German = german.mls
```

And the specific language to use, is determined by `StartingLanguage` tag:
```csdiff
StartingLanguage = French
```

# build_mls.exe
build_mls.exe was a utility used in magic to add some info to a translation file that magic used internally.
The migrated code **does not** need the build_mls.exe - and can work with the original translation file.


# How does the translation work in the migrated code
The entire implementation of Multilingual support is quite simple, it's implementation is in a class called `Languages` in ENV (less than 150 lines of code)

The method that is responsible for translating is called `Translate` and you can view or change it any way you like.

The way it works is that the method `Translate` is called from every control when that control has text that needs to be translated.

For example, here's the code for the `Label` control in ENV, with the call that is responsible for the translation (highlighted in green).
```csdiff
 public class Label:Firefly.Box.UI.Label
{
    public Label()
    {
            
    }
+    protected override string Translate(string term)
+    {
+        return base.Translate(ENV.Languages.Translate(term));
+    }

	....
```


# What can we change?
Actually, you can change anything you want - the implementation is so easy, so you can change it in many ways.

Here are some examples:
## Track which terms don't have a translation
Just go to the `Translate` method and add the following code:
```csdiff
 public static string Translate(string text)
{
    if (text == null)
        return null;
    string result;
    var trimEnd = text.TrimEnd(' ');
    if (_current.Value._currentDictionary().TryGetValue(trimEnd, out result))
    {
        if (ENV.UserSettings.Version10Compatible)
            return result + new string(' ', text.Length - trimEnd.Length);
        else
            return result;
    }
    {
+       System.Diagnostics.Trace.WriteLine(text);
        if (ENV.UserSettings.Version10Compatible)
            return text;
        else
            return trimEnd;
    }
}
```

## Load the translations from a database
In your code (not env), create the business process that reads the data from the database.
When the process starts, it should call the `GetLanguage` method for the language you want to load from the database. That method returns a dictionary to which you can simply add terms.

## Use google translate to translate things
In the ENV\Labs folder, there is a class called `translator` that we use when we demo with Google Translate.
You can change the `Translate` method in the `Languages` class to call the `TranslateText` method ni the `Translator` class that calls google translate.
You'll need a google translate api key to do that.

In the `Translator` class there is also an interesting implementation in the `TranslateCurrent` method, that translates the control which the cursor parks on. We use it in our testing when we are testing applications that are non English.



## Here's a video that demos the basic usage of the mls files
<iframe width="560" height="315" src="https://www.youtube.com/embed/MsF3PPGwdD0" frameborder="0" allowfullscreen></iframe>