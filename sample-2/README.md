 
**Step 1: Install Laravel Project**
- Use Composer to create a new Laravel project named 'example-app' with version ^11.0.
  - Command: 
    ```bash
    composer create-project laravel/laravel:^11.0 example-app
    ```

**Step 2: Install Livewire**
- Add Livewire to your project dependencies using Composer.
  - Command: 
    ```bash
    composer require livewire/livewire
    ```
- Include Livewire styles and scripts in your Blade layout file.
  - Example: 
    ```bash
        <head>
        @livewireStyles
        </head>
        <body>
        ... 
        @livewireScripts
        </body>
        >> homelayout.blade.php
        >> adminLayout.blade.php
        >> vendorLayout.blade.php
        >> userlayout.blade.php
    ```
- Create a Livewire component named 'Login'.
  - Command: 
    ```bash
    php artisan make:livewire Login
    php artisan make:livewire Register
    ```

**Step 3: Create Database**
- Create a MySQL database named 'login_with_livewire'.

**Step 4: Set Environment Variables**
- In your .env file, configure the database connection settings.
  - Example:
    ```bash
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=login_with_livewire
        DB_USERNAME=root
        DB_PASSWORD=
    ```

**Step 5: Run Migrations**
- Create necessary tables by running migrations.
  - Command: 
    ```bash
    php artisan migrate
    ```
**Step 5:  Create controller, middlewware, and the routes** 
- Create necessary tables by running migrations.
  - Command: 
    ```bash
        Middlewares :
        php artisan make:middleware adminAuth
        php artisan make:middleware userAuth
        php artisan make:middleware vendorAuth

        Controllers :  
          LoginController, 
          Admin/DashboardController, 
          Vendor/DashboardController, 
          DashboardController

    ```
**Step 6: add auth check in the middlewares acording to role**
- Create necessary tables by running migrations.
  - Command: 
    ```bash
        if(auth()->check() && auth()->user()->role == "admin"){
            return $next($request);
        }
        return redirect()->route('login');  

        Kernel.php
        protected $routeMiddleware = [
            'checkAuth' => \App\Http\Middleware\checkAuth::class,
            'adminAuth' => \App\Http\Middleware\adminAuth::class,
            'userAuth' => \App\Http\Middleware\userAuth::class,
            'vendorAuth' => \App\Http\Middleware\vendorAuth::class, 
        ];

         
**Step 7: add auth check in the middlewares**
- Create necessary tables by running migrations.
  - Command: 
    ```bash
        
         Routes :  
          Route::get('/login', 'App\Http\Controllers\LoginController@login')->name('login')->middleware('checkAuth');
          Route::get('/register', 'App\Http\Controllers\LoginController@register')->name('register')->middleware('checkAuth');
          Route::get('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');



          Route::group(['middleware' => ['userAuth']], function(){
          Route::get('/', 'App\Http\Controllers\DashboardController@dashboard')->name('user.dashboard');
          });

          Route::group(['prefix' => 'admin','middleware' => ['adminAuth']], function(){
          Route::get('/', 'App\Http\Controllers\Admin\DashboardController@dashboard')->name('admin.dashboard');
          });

          Route::group(['prefix' => 'vendor','middleware' => ['vendorAuth']], function(){
          Route::get('/', 'App\Http\Controllers\Vendor\DashboardController@dashboard')->name('vendor.dashboard');
          });

    ```

 
 **Step 8: Run project**
  - Command: 
    ```bash
    php artisan serve
    ```
  Server running on http://127.0.0.1:1000