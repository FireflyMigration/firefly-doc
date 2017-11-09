keywords: AcceptButtonClick, About, Align Left, AlignRichTextBoxLeft, Align Right, AlignRichTextBoxRight, Begin Field, PlaceCursorAtStartOfTextBox, Begin Line, PlaceCursorAtStartOfLine, Begin Next Line, Begin Row, GoToFirstControl, Begin Screen, GoToTopGridRow, Begin Table, GoToFirstRow, Browser Status Text Change, Bullet, Button Press, PerformButtonClick, ButtonClick, Cancel, UndoChangesInRow, Center, Change Color, Change Font, ClearCurrentValueInTemplate, ClearTemplate, Click, Close, CloseForm, Close All, CloseAllTasks, Close Application, Close Context, Collapse Node, CollapseTreeNode, Colors, Column Click, GridColumnClick, Column Filter, GridColumnFilterClick, Context Got Focus, ContextGotFocus, Context Lost Focus, ContextLostFocus, Control Hit, BeforeControlClick, Control Modify, ControlValueChanged, Copy, Create Child, InsertChildNode, Create Line, InsertRow, Create Records, SwitchToInsertActivity, Cut, DblClick, DoubleClick, Del Current Char, DeleteNextCharacter, Del Previous Char, DeletePreviousCharacter, Delete Line, DeleteRow, Ditto, SetFocusedControlValueSameAsInPreviousRow, Drag Begin, DragStart, Drop, DragDrop, Edit Node, BeginEditingTreeNodeCaption, Empty Dataview, NoData, End Field, PlaceCursorAtEndOfTextBox, End Line, End Row, PlaceCursorAtEndOfLine, End Screen, GoToLastControl, End Table, GoToLastRow, Exit, Exit System, ExitApplication, Expand Node, ExpandTreeNode, External Event, ExternalEvent, Fonts, Help, Indent, Index Change, Invert Marking, Locate Next, FindNextRow, Locate a Record, FindRows, Mark All, MultiSelectAllRows, MultiSelectToNextPage, MultiSelectToNextRow, MultiSelectToPreviousPage, MultiSelectToPreviousRow, Mark Next Char, SelectNextCharacter, Mark Next Line MLE, Mark Prev Line MLE, Mark Previous Char, Mark To Bottom, Mark To Top, Mark/UnMark, Modify Records, SwitchToUpdateActivity, Mouse Out, MouseLeave, Mouse Over, MouseEnter, Move To Parent, Next Char, PlaceCursorAfterNextCharacter, Next Field, GoToNextControl, Next Line, PlaceCursorAtNextLineInMultiline, Next Line Mark, Next Page, GoToNextPage, Next Page in MM, Next Row, GoToNextRow, Next Row in MM, Next Screen, GoToNextPage, Next Window, Next Word, PlaceCursorBeforeNextWord, OK, OLE2, Open Application, Open Form Designer, Page Footer, PageFooter, Page Header, PageHeader, Paste, Post Refresh by Parent, Prev Line Mark, Prev Page in MM, Prev Row in MM, Previous Char, PlaceCursorBeforePreviosuCharacter, Previous Field, GoToPreviousControl, Previous Line, PlaceCursorAtPreviousLineInMultiline, Previous Page, GoToPreviousPage, Previous Row, GoToPreviousRow, Previous Screen, GoToPreviousPage, Previous Window, Previous Word, PlaceCursorBeforeWord, Print Data, ExportData, Printer Setup, PrinterSettingsDialog, Program Recall, SingleInstanceAsyncTaskReactivated, Query Records, SwitchToBrowseActivity, Quit, UndoChangesInRowAndExit, Range of Records, FilterRows, Record Flush, SaveCurrentRow, Screen Refresh, RefreshDisplayedData, Select, Select All, SelectAll, SelectNextTabPage, SelectPreviousTabPage, SelectToFirstCharacter, SelectToLastCharacter, Server termination, Set to NULL, SetFocusedControlValueToNull, Shell to OS, ShellToOS, Sort Records, CustomOrderBy, Subform Refresh, RefreshSubform, TemplateExit, TemplateExpression, TemplateFromValues, TemplateOk, TemplateToValues, ToggleCurrentRowMultiSelection, ToggleInsertOverwriteMode, To First Child, GoToFirstChildNode, To next sibling, To prev sibling, UnMark All, CancelMultiSelection, Undo Editing, UndoEditing, Unident, User Action, CustomCommand, View Refresh, ReloadData, View by Key, SelectOrderBy, Wide, ExpandTextBox, Window Hit, Window Reposition, BeforeWindowClick, Window Resize, WindowResize, Zoom, Expand
### Magic internal events
In Magic you can use either the build in internal events or create your own events. This compare table only compares the build in internal events of Magic. In Firefly however these are split into two parts. One part, the internal events are in  Firefly and can be invoked by 'Firefly.Box.Command.' or in short 'Command.. The other part resides in ENV and can be invoked by using 'ENV.Commands.' or in short `Commands.` (with and 's'!).

The newly added handlers in Firefly are also added for search purposes.

### Firefly handlers
```csdiff
Raise(Command.Expand)
```

| Magic internal event | Firefly Command 
| :--- | :--- |
| Align Left | AlignRichTextBoxLeft |
| Align Right | AlignRichTextBoxRight |
| Begin Field | PlaceCursorAtStartOfTextBox |
| Begin Line | PlaceCursorAtStartOfLine |
| Begin Row | GoToFirstControl |
| Begin Screen | GoToTopGridRow |
| Begin Table | GoToFirstRow |
| Cancel | UndoChangesInRow |
| Click | Click |
| Close | CloseForm |
| Collapse Node | CollapseTreeNode |
| Column Click | GridColumnClick |
| Control Hit | BeforeControlClick |
| Control Modify | ControlValueChanged |
| Copy | Copy |
| Create Child | InsertChildNode |
| Create Line | InsertRow |
| Create Records | SwitchToInsertActivity |
| Cut | Cut |
| DblClick | DoubleClick |
| Del Current Char | DeleteNextCharacter |
| Del Previous Char | DeletePreviousCharacter |
| Delete Line | DeleteRow |
| Ditto | SetFocusedControlValueSameAsInPreviousRow |
| Drag Begin | DragStart |
| Drop | DragDrop |
| Edit Node | BeginEditingTreeNodeCaption |
| Empty Dataview | NoData |
| End Field | PlaceCursorAtEndOfTextBox |
| End Row | PlaceCursorAtEndOfLine |
| End Screen | GoToLastControl |
| End Table | GoToLastRow |
| Exit | Exit |
| Exit System | ExitApplication |
| Expand Node | ExpandTreeNode |
| Help | Help |
| Mark All | MultiSelectAllRows |
| Mark Next Char | SelectNextCharacter |
| Modify Records | SwitchToUpdateActivity |
| Mouse Out | MouseLeave |
| Mouse Over | MouseEnter |
| Next Char | PlaceCursorAfterNextCharacter |
| Next Field | GoToNextControl |
| Next Line | PlaceCursorAtNextLineInMultiline |
| Next Page | GoToNextPage |
| Next Row | GoToNextRow |
| Next Screen | GoToNextPage |
| Next Word | PlaceCursorBeforeNextWord |
| Paste | Paste |
| Previous Char | PlaceCursorBeforePreviosuCharacter |
| Previous Field | GoToPreviousControl |
| Previous Line | PlaceCursorAtPreviousLineInMultiline |
| Previous Page | GoToPreviousPage |
| Previous Row | GoToPreviousRow |
| Previous Screen | GoToPreviousPage |
| Previous Window | - |
| Previous Word | PlaceCursorBeforeWord |
| Printer Setup | PrinterSettingsDialog |
| Query Records | SwitchToBrowseActivity |
| Quit | UndoChangesInRowAndExit |
| Record Flush | SaveCurrentRow |
| Screen Refresh | RefreshDisplayedData |
| Select | Select |
| Select All | SelectAll |
| Set to NULL | SetFocusedControlValueToNull |
| Subform Refresh | RefreshSubform |
| To First Child | GoToFirstChildNode |
| UnMark All | CancelMultiSelection |
| Undo Editing | UndoEditing |
| View Refresh | ReloadData |
| Wide | ExpandTextBox |
| Window Hit | BeforeWindowClick |
| Window Resize | WindowResize |
| Zoom | Expand |

### ENV handlers
```csdiff
Raise(Commands.ShellToOS)
```

| Magic internal event | ENV Command |
| :--- | :--- |
| Button Press | PerformButtonClick |
| Close All | CloseAllTasks |
| Column Filter | GridColumnFilterClick |
| Context Got Focus | ContextGotFocus |
| Context Lost Focus | ContextLostFocus |
| External Event | ExternalEvent |
| Locate Next | FindNextRow |
| Locate a Record | FindRows |
| Page Footer | PageFooter |
| Page Header | PageHeader |
| Print Data | ExportData |
| Program Recall | SingleInstanceAsyncTaskReactivated |
| Range of Records | FilterRows |
| Shell to OS | ShellToOS |
| Sort Records | CustomOrderBy |
| User Action 1 | CustomCommand_1 |
| User Action 2 | CustomCommand_2 |
| User Action 3 | CustomCommand_3 |
| User Action 4 | CustomCommand_4 |
| User Action 5 | CustomCommand_5 |
| User Action 6 | CustomCommand_6 |
| User Action 7 | CustomCommand_7 |
| User Action 8 | CustomCommand_8 |
| User Action 9 | CustomCommand_9 |
| User Action 10 | CustomCommand_10 |
| User Action 11 | CustomCommand_11 |
| User Action 12 | CustomCommand_12 |
| User Action 13 | CustomCommand_13 |
| User Action 14 | CustomCommand_14 |
| User Action 15 | CustomCommand_15 |
| User Action 16 | CustomCommand_16 |
| User Action 17 | CustomCommand_17 |
| User Action 18 | CustomCommand_18 |
| User Action 19 | CustomCommand_19 |
| User Action 20 | CustomCommand_20 |
| View by Key | SelectOrderBy |
| Wide | ExpandTextBox |
| Window Hit | BeforeWindowClick |
| Window Reposition | - |
| Window Resize | WindowResize |
| Zoom | Expand |

Contributor: Harry Kleinsmit.

