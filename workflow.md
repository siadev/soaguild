## <img src="http://soaguild.com/images/soa_w100.png" alt="Sons of Anarchy"  title="Sons of Anarchy"> Sons of Anarchy Guild

#####Project Workflow

<img src="http://soaguild.com/images/wow_w200.png" alt="Sons of Anarchy"  title="Sons of Anarchy">

### Preamble

SOA is a web application written in the Laravel framework.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Purpose of this file

The purpose of this file is to briefly list the tools used and methods 
that every project should consist of.
 
 ## List of Composer Installation (Packages)
* <b>Before we start run</b>

    ```
    sudo composer update 
    ```
  Also create a tiny script to prevent composer errors:
    ```
        php artisan down
        php artisan clear-compiled
        composer update --no-dev
        php artisan optimize
        php artisan up    
    ```
  nb: you may have to delete <b>vendor/compiled.php</b> manually if errors persist.    
  
*  <b> Generators for database migration. </b>

    ```
     sudo composer require laracasts/generators --dev 
     
    ```

*   <b> Testdummy and Faker </b>

	```
 	sudo composer require laracasts/testdummy --dev 
    
    ```

* <b> Name your Project for NAMESPACE </b>

    ```
    php artisan app:name {YOUR_NAMESPACE}     
    ```

* <b> Problems with log files (Write Protect)<br>
      Edit your sites-available/site.conf file<br>
      Add these line so that www-data can write
    ```html
            <Directory /srv/www/SITENAME/storage/>
                Options All
                AllowOverride All
                Require all granted
            </Directory>
    
            <Directory /srv/www/SITENAME/storage/logs>
                Options All
                AllowOverride All
                Require all granted
            </Directory>
    ```
    
* <b> Edit /[Project root]/composer.json </b>

     Generators and Testdummy should be enclosed inside require-dev (as they are dev only tools)<br>
     So move "laracasts/generators"... from "require": { ... to "require-dev": {...

* <b> Edit /[Project root]/config/app.php </b>
 
 add the provider in app/Providers/AppServiceProvider.php, like so:
 
 	```php
    
 	public function register()  // <== Do not create a new one if exists | add the if statement
		{
    		if ($this->app->environment() == 'local') {
        	$this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
    	}
	}
    
 	```
    To complete New Packages Run:
    ```
        sudo composer update
    ```
* <b> Create Seed files - Using Testdummy and Faker </b>
 
    1. to create a file use:

	    ```
         php artisan make:seed [Filename] 
    
        ```
    + Help with Testdummy and Faker:
    
    https://github.com/laracasts/TestDummy
    
    <b> NOTES ON SEEDING : </b>
    ```
        composer dump-autoload
    ```
    Then run:
    ```
       php artisan db:seed
    
    ```
      
 
 * <b> Transform PHP vars to Javascript </b>
  
   Begin by installing this package through Composer.
   
	```php
		{
    		"require": {
        	"laracasts/utilities": "~2.0"
    		}
		}
        
    ```
    
    <b>Reference: </b> https://github.com/laracasts/PHP-Vars-To-Js-Transformer
 +    


### Links:

 * [PHP Vars To JavaScript Transformer](https://github.com/laracasts/PHP-Vars-To-Js-Transformer)
 * [Laracasts](https://laracasts.com) Laravel and PHP tutorials.
 * [Testdummy](https://github.com/laracasts/TestDummy) Github repository.
 * [Generators](https://github.com/laracasts/Laravel-5-Generators-Extended) Github repository. 


### Copyright
2015 &copy; Copyright SIADEV, division of SIACOM - Web developers and Network Engineers.


