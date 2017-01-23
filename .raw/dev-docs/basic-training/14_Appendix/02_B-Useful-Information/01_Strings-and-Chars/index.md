### String and Chars

1. Char is a single character
2. String is comprised of characters
3. String is surrounded with quotes for example: `"firefly"`
4.	char is surrounded with single quote, for example: `'x'`
5. `+ -` concatenates two strings. For example: `"firefly" + " " + "Migration"`
6.	Everything can be turned into a string, either implicitly or by calling it's `ToString()` method.
7.	Special Characters:
    a.	Backslash is a special character used to include special characters in a string. For example:

|    Char    |    Description                                                             |    Example                          |    Result                     |
|------------|----------------------------------------------------------------------------|-------------------------------------|-------------------------------|
|    \\      |    Adds a back slash to the string                                         |    "c:\\temp\\someFile.txt"         |    C:\temp\somefile.txt       |
|    \"      |    Add the quote char to a string                                          |    "David says: \"hello   all\""    |    David says: "hello all"    |
|    \n      |    New line (chr13)                                                        |    "David\nFirefly"                 |    David   Firefly            |
|    \r      |    Return (chr 10)                                                         |    "David\r\nFirefly"               |    David   Firefly            |
|    \t      |    Tab Char                                                                |    "David\tFirefly"                 |    David       Firefly        |
|    @       |    Used to define a string that doesn't have   special characters in it    |    @"c:\temp\someFile.txt"          |    C:\temp\somefile.txt       |