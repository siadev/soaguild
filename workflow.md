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
    <sub><b>note:</b> you may have to delete <b>vendor/compiled.php</b> manually if errors persist.</sub>    
  
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
      
 
 * <b> NPM Install gulp and Laravel </b>
 Before using the Gulp file with elixir you need to Install the package dependencies.<br>
 simply type:
 
     ```
         sudo npm install
     ```
 * <b> Install Laravel Breadcrumbs </b>
   1. ``` sudo composer require davejamesmiller/laravel-breadcrumbs  ```
   +  Add to config/app.php<br>
      Add the service provider to ```providers```:
   ```php
           'providers' => [
           
               // ... Inside Providers Array
               
               /*
                *  Other providers install through composer
                */

               'DaveJamesMiller\Breadcrumbs\ServiceProvider',
           ],
   ```
   
   And add the facade to ```aliases```:
   ```php
       'aliases' => [

               // ... Inside Aliases Array
               
               /*
                *  Other Aliases install through composer
                */

               'Breadcrumbs' => 'DaveJamesMiller\Breadcrumbs\Facade',
       ],
   ```   
   
   Then define your breadcrumbs by creating:
   ```
      app/Http/breadcrumbs.php
   ```
 
 * <b> username with Middleware
   1. in the create_user_table migration file add the following line:
   ```php
       $table->string('username')->unique();
   ```
   + in the User.php model file change the $fillable array to :
   ```php
      protected $fillable = ['name','username', 'email', 'password'];
   ```
   + add to the register.blade.php view the input field for the username
   ```php
       <div class="form-group">
          <label class="col-md-4 control-label">Username</label>
          <div class="col-md-6">
             <input type="text" class="form-control" name="username" value="{{ old('username') }}">
          </div>
       </div>
   ```
   + in the default registrar.php Service add the username field in the create method
   ```php
       public function create(array $data)
       {
          return User::create([
             'name' => $data['name'],
             'email' => $data['email'],
             'username' => $data['username'],
             'password' => bcrypt($data['password']),
          ]);
       }
   ```
   ```bash
       php artisan migrate
   ```
   + create a middleware
   ```php
       php artisan make:middleware simpleAuthMiddleware
   ```
   +  the code for the middleware is very easy :
   ```php
       <?php namespace App\Http\Middleware;
        
       use Closure;
        
        
       class SimpleAuthMiddleware
       {
        
          /**
           * Handle an incoming request.
           *
           * @param  \Illuminate\Http\Request $request
           * @param  \Closure $next
           * @return mixed
           */
          public function handle($request, Closure $next)
          {
             return Auth::onceBasic('username') ?: $next($request);
          }
        
       }
   ```
   + in the kernel.php file add in the $routeMiddleware the following line
   ```php
       'simpleauth' => 'App\Http\Middleware\SimpleAuthMiddleware',
   ```
   + Now we are ready to use Middelware for username<br>
   Try this in your  routes.php file
   ```php
       Route::get('action', ['uses' => 'ActionController@index','middleware'=>'simpleauth']);
       Route::post('action/create', ['uses' => 'ActionController@store','middleware'=>'simpleauth']);
   ```

 * <b><i> phpspec </i></b>
   install phpspec
   ```
       sudo composer require phpspec/phpspec --dev
   ```
   create alias for ease of use
   ```
       alias phpspec=/srv/www/[SITENAME]/vendor/phpspec/phpspec/bin/phpspec
   ```
   test it
   ```
       phpspec
   ```
   For phpspec to work with Laravel you need to create a .phpspec.yml file
   ```
       touch .phpspec.yml
   ```
 
 * <b> phpunit </b>
   install phpunit Globally
   ```
        sudo composer global require "phpunit/phpunit=4.6.*"
   ```
   create an alias for phpunit
   ```
        alias phpunit=~/.composer/vendor/bin/phpunit   
   ```
 
 * <b> Codeception </b> 
   Codeception is a testing framework that uses PHPUnit and phpspec
   first install it globally
   ```
       cd /usr/local/bin/codeception
       wget http://codeception.com/codecept.phar
   ```
   Next create aliases to access cli commands from any project
   1) Edit the alias file
   ```bash
       sudo vim ~/.bash_aliases
   ```
   2) Add these lines
   ```bash
       alias codec='php /usr/local/bin/codeception/codecept.phar'
       
       alias codecf='codec run functional'
       
       alias codecs='codec run Selenium'
       
       alias codeca='codec run acceptance'
   ```
   
 * <b> Travis </b>
 
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


