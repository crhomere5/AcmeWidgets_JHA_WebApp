Included in this folder should be a excecutable, a flat .sql file and a plethora of PHP files which make
up the majority of my solution. Amongst the files included the following are
the most important:

wampserver3.2.3_x64.exe (Download from https://www.wampserver.com/en/): 

To run this web app you will need to host it on a web server. For this project I used the wamp apache server (link to download above). 
I configured the database connection (db.php, config.php) to connect to localhost 
(127.0.0.1). After starting up the server, if you type localhost into your domain browser while WAMP is running you are 
taken to a server page from where you can run the provided php files.

In order to set the files up for running you need to copy this folder, navigate to the wamp64 
directory (C:\wamp64) and paste the folder in the .\www directory. The final path should look something
like this in windows:

C:\wamp64\www\AcmeWidgets_JHA_Database_WebApp

Once you have pasted this folder into the right directory, the file should appear in the WAMP server in your
browser. To open a PHP file simply add the file path to the end of 'localhost' in the domain browser.

Ex: Localhost/AcmeWidgets_JHA_Database_WebApp/JHA_Data_Manager.php


acmewidgetsjha.sql: 

This is a flat .sql file that contains code for constructing the database I used for this
project. Open this file in the enviorment of your choice (I used mySQL Workbench) and run the commands to contruct the database.
The db.php and config.php files are configured to establish a connection with the WAMP server once the database is set
up.

JHA_Data_Manager.php:

This is the main page of the application. If you go into the WAMP server and enter the file path that navigates to this file you
should end up on a page that allows you to enter the metadata for a JHA. On this page there is a button that sends you to another page
where you can add the actual JHA data as it cooresponds to the metadata you just entered on the previous page. Between these two pages 
you can interact with the user interface to add, modify, view and delete JHA records to/from the database.

Update 4/23/2021: Changed DeleteJHA.php to demonstrate an example of mitigating sql injection 

This should summerize the essential procedure for running this web app. 

crhomere@vt.edu

Thank You!