# I/O Devices

## Introduction
The I/O Devices has several Media options.

![](iodevice.png)

The properties section of each Media looks like this:

![](ioproperties.png)

The actual output or input device is determined in Magic by the Media property. The following table specifies the different Media defined in Magic and their .Net counterparts in the migrated code.

| No 	| Media Type                 	| Name in migrated code                       	|
|----	|----------------------------	|---------------------------------------------	|
| 1. 	| Graphic Printer            	| PrinterWriter                               	|
| 2. 	| Printer                    	| TextPrinterWriter                           	|
| 3. 	| Console                    	| PrinterWriter with PrintPreview set to true 	|
| 4. 	| File with Access Write     	| FileWriter                                  	|
| 5. 	| File with Access Read      	| FileReader                                  	|
| 6. 	| Requester                  	| WebWriter                                   	|
| 7. 	| XML Direct Access          	| XML                                         	|
| 8. 	| Variable with Access Write 	| ByteArrayWriter                             	|
| 9. 	| Variable with Access Read  	| ByteArrayReader                             	|

Each section below will list the relevant Methods and Properties for each Media type:



