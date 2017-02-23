# Make your coding easier – use snippets

As much as a developer’s life is exciting / challenging / demanding (you can choose any of the 3…), sometimes there are parts of it you wish you could change / make easier. Mostly in the pieces of code you repeat in almost any class you write.

Well – using snippets can make it a bit easier.  
A snippet is a usually a small reusable piece of structured code template, which the programmer can easily use when coding.  
You have probably been using it for some time without realizing you are using snippets.  
The most common ones are for, foreach, while, mbox – once you type these words (the complete list is here) and tab twice, a little piece of code is generated for you.

Visual Studio is friendly enough to let you add your own snippets – you can read an article describing how to write one here (there are also snippets editors you can use)

We have created our own sample of a snippet you can use – to see how it works, what needs to be defined and how to use it please watch this video.

<iframe width="560" height="315" src="https://www.youtube.com/embed/ZkQKNSxaeQY" frameborder="0" allowfullscreen></iframe>

This is the snippet code we used:

```
<?xml version="1.0" encoding="utf-8" ?>
<CodeSnippets xmlns="http://schemas.microsoft.com/VisualStudio/2005/CodeSnippet">
 <CodeSnippet Format="1.0.0">

<Header>
 <Title>Public member</Title>
 <Shortcut>ffp</Shortcut>
 <Description>Adds a public member to a class</Description>
 <Author>Firefly Ltd</Author>
 <SnippetTypes>
 <SnippetType>Expansion</SnippetType>
 </SnippetTypes>
 </Header>

 <Snippet>
 <Declarations>
 <Literal>
 <ID>type</ID>
 <ToolTip>Member Type</ToolTip>
 <Default>TextColumn</Default>
 </Literal>
 <Literal>
 <ID>name</ID>
 <ToolTip>Member Name</ToolTip>
 <Default>myName</Default>
 </Literal>
 
 </Declarations>
 <Code Language="csharp"><![CDATA[public readonly $type$ $name$ = new $type$ ($end$);]]>
 </Code>
 </Snippet>
 </CodeSnippet>
</CodeSnippets>
```