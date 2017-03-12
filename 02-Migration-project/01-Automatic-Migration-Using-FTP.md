# Automatic Migration Using FTP

This document explains how to run an automatic migration using Firefly’s FTP server. The migration can be invoke at any time, in order to get an updated error report or a test version. Usually, it is used after uploading a new version of the original applications or when Firefly has enhanced its migration engine. In order to run a migration, please do the following steps:

1. Log in to the Firefly’s FTP server using your account username and password.
2. Upload the exports of your applications and other environment files as needed into the AutomaticMigration folder.
3. Create an empty file named “Start” in the AutomaticMigration folder (or delete the extension of the existing “Start.Done” file). This is the trigger of the migration process.
4. An email message will be sent to you, informing that the migration process has started.
5. Few minutes later, the “Start” file name will be changed to “Start.Done” and the content of this file will be the log of the migration process.
6. A second email will be sent, informing that the migration process has completed successfully with statistics about the converted application.
7. The new version and error report will be found in the AutomaticMigration\MigrationResult folder, on the FTP server.
8. In case you want to migrate to an older version of Firefly, you may do so by changing the "Start.Done" to "Start.<version number>" (E.g "Start.26175"). The Firefly version can be found by Right Clicking on Firefly.Box.dll -> "Details" TAB
