keywords:tab,tabbing,tabing,taborder,tab order,AllowFocusWithoutBoundColumn,focus

In magic you could only focus on buttons that had a column attached to them VIA their data.

By default the migrated application matches that behavior, but we never liked it, so in .NET we've added a property to the button that changes this behavior and allows you to fucos on a button that is not bound to any column, the property is called `AllowFocusWithoutBoundColumn `

Now you can add a button that can be focused without a column. Just set the `AllowFocusWithoutBoundColumn`  to true.