 
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
        >> userlayout.blade.php
    ```
- Create a Livewire component named 'Login'.
  - Command: 
    ```bash
    php artisan make:livewire Login
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
 
 **Step 6: Run project**
  - Command: 
    ```bash
    php artisan serve
    ```
  Server running on http://127.0.0.1:1000