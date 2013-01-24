# The Wine Cellar  
# Copyright (C) 2012-2013  Luis E. S. Dias
## Wine Cellar management software  

**Changelog for version 0.5**  
* upgrade to CakePHP 2.2.5  
* upgrade to ReportManager plugin version 0.4.5.1  

**Changelog for version 0.4**  
* upgrade to CakePHP 2.1.1  
* ReportManager plugin added  

**Changelog for version 0.3**  
* upgrade to CakePHP 2.0.6  
* wine search method uses CakeDC component  
* layout width increased to 1024 pixels  
* form title indicates action  
* wine star rating  
* minor css corrections  
* bugfix Member validation  

## Installation  

1. Extract the system from .zip file  

Extract the file on your web server document root folder.  

2. Create the database  ( suggested name: twc )  

Use the database.sql file to create the database and fill with sample data.  

3. Database configuration  

Edit app/config/database.php entering host, login and password.  

4. Edit the current language  

Edit the app/Config/bootstrap.php on the line you see:  

```php
Configure::write('Config.language', 'eng');  
```

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

## Notes:  

Web Template designed by Flipside Digital  

The Wine Cellar Application uses the following jQuery Plugins:  

Jixedbar  
http://code.google.com/p/jixedbar/  

Tipsy  
http://onehackoranother.com/projects/jquery/tipsy/  

jCarousel  
http://sorgalla.com/jcarousel/  

jQuery UI Stars  
http://plugins.jquery.com/project/Star_Rating_widget  

## Author  
Luis E. S. Dias  
Contact: smartbyte.systems@gmail.com