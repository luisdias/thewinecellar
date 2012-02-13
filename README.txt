The wine cellar
Copyright (C) 2012  Smartbyte - Luis E. S. Dias
-----------------------------------------------

INSTALLATION

1. Extract the system from .zip file

Extract the file on your web server document root folder.


2. Create the database  ( suggested name: twc )

Use the database.sql file to create the database and fill with sample data.


3. Database configuration

Edit app/config/database.php entering host, login and password.


4. Edit the current language

Edit the app/Config/bootstrap.php on the line you see:

Configure::write('Config.language', 'eng');

change the 'eng' keyword for:
'por' : portuguese
'fre' : french
'ita' : italian
'spa' : spanish

All translations were made with Google translator's help. So please don't shoot me! :)
If you want to enhance the translations, edit the default.po file ( app/Locale/your_language/LC_MESSAGES ).

5. Default user:

Login: admin
Password: admin

Contact me for customizations : smartbyte.systems@gmail.com