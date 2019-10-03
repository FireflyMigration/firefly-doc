In the Firefly Project
### WizardOfOz.Witch.Types.TextFormat Class
1. Add the following two members:
```csdiff
public static char CharToIndicateTrim = '~';
bool _trimResult = false;
```

2. Add the following chars to the constructor:
```csdiff
ImeMode _imeMode = ImeMode.NoControl;
TextFormat(string format)
{
    if (string.IsNullOrEmpty(format))
    {
        _ignoreFormat = true;
        _dataLength = int.MaxValue;

        return;
    }
+   if (format.Length == 1 && format[0] == CharToIndicateTrim)
+   {
+       _ignoreFormat = true;
+       _dataLength = int.MaxValue;
+       _trimResult = true;
+       return;
+   }

    FormatStructure<TextFormatHelper> structure = new FormatStructure<TextFormatHelper>();
    _formater = new StructureBridgeToFormater(structure);
    bool hassimpleSingleItem = false;
    FormatReader fr = new FormatReader(format);
```

3. Later in that constructor add the following code to the `default` part of the `switch` statement that starts on line 150 in our version of the code:
```csdiff
case 'H':
    _hebrew = true;
    break;
case 'K':
    if (char.IsNumber(fr.PeekChar()))
    {
        var x = fr.ReadNumber();
        _imeMode = TranslateImeMode(x);
        break;
    }
    else
        goto default;
default:
+   if (c == CharToIndicateTrim)
+   {
+       _trimResult = true;
+   }
+   else
+   {
        structure.AddConstant(c, fr.ReadNumber());
        _hasNoConstants = false;
+   }
    break;

```

4. Replace the `ToText` method which receive two parameters implementation
```csdiff
public Text ToText(Text source, TextFormatHelper helper)
{
-   if (_ignoreFormat)
-       return source;
-   return _formater.ToText(source, helper);
+   var result = source;
+   if (!_ignoreFormat)
+   {
+       result = _formater.ToText(source, helper);
+   }
+   if (_trimResult && result != null)
+       result = result.Trim();
+   return result;
}

```

###  WizardOfOz.Witch.Types.NumericFormatClass
1. Add the following member to the class
```csdiff
bool _autoSkip = false;
bool _allowNegative = false;
bool _commaSeperated = false;
bool _leftJustified = false;
+bool _trim = false;
char _fillerChar = ' ';
char _zeroValueFillerChar = (char)0;
```
2. in the constructor add the following code to the `default` part of the `switch` statement that starts on line 117 in our version of the code:

```csdiff
switch (c)
{
    case 'L':
        _leftJustified = true;
        break;
    case 'A':
        _autoSkip = true;
        break;
    case 'N':
        _allowNegative = true;
        break;
    case 'C':
        _commaSeperated = true;
        break;
    default:
+       if (c == TextFormat.CharToIndicateTrim)
+       {
+           _trim = true;
+           break;
+       }
+       else
            return false;
}
```

3. In the `ToStringClass` Constructor add at the end:
```csdiff
    ...
    PrepareOriginalNumber();

    if (_fillerChar != (char)0) Result = "".PadLeft(Result.Length, _fillerChar);
+   if (_parent._trim)
+       Result = Result.Trim();
}
```
### Firefly.Box.Data.Advanced.TypedColumnBase class
Add the following code to the `GetDisplayTextProvider` method
```csdiff
internal DisplayTextProvider<dataType> GetDisplayTextProvider(string format, bool useInputRange)
{
    if (string.IsNullOrEmpty(format))
        format = _formatString;
+   if (format!=null&& format.Length == 1 && format[0] == TextFormat.CharToIndicateTrim)
+       format = _formatString + format;
    if (_prevDisplayTextProvider == null || !(_lastFormat == format && _lastUseInputRange == useInputRange))
    {
        _prevDisplayTextProvider = _CreateDisplayTextProvider(format, useInputRange ? _range : string.Empty, _nullDisplayText ?? string.Empty);
        _lastFormat = format;
        _lastUseInputRange = useInputRange;
    }
    return _prevDisplayTextProvider;

             
}
```