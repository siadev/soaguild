## <img src="http://soaguild.com/images/soa_w100.png" alt="Sons of Anarchy"  title="Sons of Anarchy"> Sons of Anarchy Guild

#####Project Workflow

<img src="http://soaguild.com/images/wow_w200.png" alt="Sons of Anarchy"  title="Sons of Anarchy">

### Preamble

SOA is a web application written in the Laravel framework.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Purpose of this file

The purpose of this file is to briefly list the tools used and methods 
that every project should consist of.
 
## Middleware
 
* <b> username with Middleware </b>
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
