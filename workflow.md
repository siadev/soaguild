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
* ***Before we start run***

    ```
    sudo composer update 

    ```
  
*  *** Generators for database migration. ***

    ```
     sudo composer require laracasts/generators --dev 
     
    ```

*   *** Testdummy and Faker ***

	```
 	sudo composer require laracasts/testdummy --dev 
    
    ```

* *** Edit /[Project root]/composer.json ***

     Generators and Testdummy should be enclosed inside require-dev (as they are dev only tools)<br>
     So move "laracasts/generators"... from "require": { ... to "require-dev": {...

* *** Edit /[Project root]/config/app.php ***
 
 add the provider in app/Providers/AppServiceProvider.php, like so:
 
 	```php
    
 	public function register()  // <== Do not create a new one if exists | add the if statement
		{
    		if ($this->app->environment() == 'local') {
        	$this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
    	}
	}
    
 	```

* *** Create Seed files - Using Testdummy and Faker ***
 
    1. to create a file use:

	    ```
         php artisan make:seed [Filename] 
    
        ```
    + Help with Testdummy and Faker:
    
    https://github.com/laracasts/TestDummy
    
    *** NOTES ON SEEDING : ***
    ```
        composer dump-autoload
    ```
    Then run:
    ```
       php artisan db:seed
    
    ```
      
 
 * *** Transform PHP vars to Javascript ***
  
   Begin by installing this package through Composer.
   
	```php
		{
    		"require": {
        	"laracasts/utilities": "~2.0"
    		}
		}
        
    ```
    
    ***Reference: *** https://github.com/laracasts/PHP-Vars-To-Js-Transformer
 +    


### Links:

 * [PHP Vars To JavaScritpt Transformer](https://github.com/laracasts/PHP-Vars-To-Js-Transformer)
 * [Laracasts](https://laracasts.com) Laravel and PHP tutorials.
 * [Testdummy](https://github.com/laracasts/TestDummy) Github repository.
 * [Generators](https://github.com/laracasts/Laravel-5-Generators-Extended) Github repository. 


### Copyright
2015 &copy; Copyright SIADEV, division of SIACOM - Web developers and Network Engineers.


