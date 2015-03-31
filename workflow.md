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
  
*  <b> Generators for database migration. </b>

    ```
     sudo composer require laracasts/generators --dev 
     
    ```

*   <b> Testdummy and Faker </b>

	```
 	sudo composer require laracasts/testdummy --dev 
    
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

 * [PHP Vars To JavaScritpt Transformer](https://github.com/laracasts/PHP-Vars-To-Js-Transformer)
 * [Laracasts](https://laracasts.com) Laravel and PHP tutorials.
 * [Testdummy](https://github.com/laracasts/TestDummy) Github repository.
 * [Generators](https://github.com/laracasts/Laravel-5-Generators-Extended) Github repository. 


### Copyright
2015 &copy; Copyright SIADEV, division of SIACOM - Web developers and Network Engineers.


