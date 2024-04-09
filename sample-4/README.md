 
Swagger Setup in Laravel

**Step 1: Install Laravel Project**
- Use Composer to create a new Laravel project named 'example-app' with version ^11.0.
  - Command: 
    ```bash
    composer create-project laravel/laravel:^11.0 example-app
    ```

**Step 2: Add swagger to laravel**
- Swagger can be added to Laravel using the darkaonline/l5-swagger package. This package generates Swagger documentation for your Laravel project.
  - Command: 
    ```bash
       composer require "darkaonline/l5-swagger"
       php artisan vendor:publish --provider "L5Swagger\L5SwaggerServiceProvider"
       php artisan l5-swagger:generate
    ```
- This will install the necessary dependencies and generate Swagger documentation for your Laravel project.
- Now you can access the Swagger UI by visiting the / route of your Laravel application.
- Once Swagger is set up, you can use it to document and test your APIs. Visit the Swagger UI in your browser and explore the endpoints documented automatically.

 **Step 3: Add Routes and controller code** 
  - Routes: 
    ```bash
          Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
            return $request->user();
        });

        Route::post('/register', [App\Http\Controllers\Api\UserController::class,'register']);
        Route::post('/login', 'App\Http\Controllers\Api\LoginController@login');
        Route::post('/forgot-password', 'App\Http\Controllers\ForgotPasswordController@forgot')->name('api.common.forgot');
        Route::post('/password/reset', 'App\Http\Controllers\ForgotPasswordController@reset')->name('password.reset');
        
        Route::middleware('auth:sanctum')->group( function () {
            Route::post('passwordSettings', 'App\Http\Controllers\Api\LoginController@passwordSettings'); 
            Route::post('/user', 'App\Http\Controllers\Api\UserController@getUserDetails');  
        });
    ```
  - Controllers
     
     ```bash
      App\Http\Controllers\Api\LoginController
      App\Http\Controllers\Api\UserController
      App\Http\Controllers\ForgotPasswordController
    ```
 **Final**
  - Create database 
  - run migrate command "php artisan migrate"
  - run the server: "php artisan serve"