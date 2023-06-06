# VegaZR-Agile-Development

# Laravel 10 & Tailwind Project with Jetstream Library

This is a step-by-step guide to help you install and run a Laravel 10 project that incorporates Tailwind CSS and the Jetstream library.

## Prerequisites

Before you begin, ensure that you have the following prerequisites installed on your system:

- PHP (version 7.4 or higher)
- Composer
- Node.js (version 14 or higher)
- NPM (Node Package Manager)
- Laravel CLI

## Step 1: Install Laravel

1. Open a terminal or command prompt.
2. Run the following command to install Laravel globally:
   ```
   composer global require laravel/installer
   ```

## Step 2: Create a New Laravel Project

1. Navigate to the desired directory where you want to create your Laravel project.
2. Run the following command to create a new Laravel project named `my-project`:
   ```
   laravel new my-project
   ```

## Step 3: Install Tailwind CSS

1. Change into your project's directory:
   ```
   cd my-project
   ```
2. Run the following command to install Tailwind CSS:
   ```
   npm install tailwindcss
   ```
3. Create a `tailwind.config.js` file in the root directory of your project:
   ```
   npx tailwindcss init
   ```
4. Open the `webpack.mix.js` file in your project's root directory and add the following code at the end:
   ```javascript
   const mix = require('laravel-mix');
   
   mix.js('resources/js/app.js', 'public/js')
       .postCss('resources/css/app.css', 'public/css', [
           require('tailwindcss'),
       ]);
   ```

## Step 4: Install Jetstream

1. Run the following command to install the Jetstream scaffolding:
   ```
   composer require laravel/jetstream
   ```
2. Run the following command to install the Jetstream stack you prefer (e.g., Livewire or Inertia):
   - Livewire:
     ```
     php artisan jetstream:install livewire
     ```
   - Inertia:
     ```
     php artisan jetstream:install inertia
     ```
3. If you're using the Inertia stack, you'll also need to install and configure Inertia. Refer to the official Laravel documentation for more information.

## Step 5: Set Up the Database

1. Configure your database settings in the `.env` file located in the root directory of your project.
2. Run the following command to migrate the database:
   ```
   php artisan migrate
   ```

## Step 6: Compile Assets

1. Run the following command to compile your assets:
   ```
   npm run dev
   ```
   You can also use `npm run watch` for automatic asset compilation during development.

## Step 7: Serve the Application

1. Run the following command to start the local development server:
   ```
   php artisan serve
   ```
2. Open your web browser and visit `http://localhost:8000` to see your Laravel application in action.

That's it! You've successfully installed and set up a Laravel 10 project with Tailwind CSS and Jetstream. Now you can start building your application using the powerful features provided by Laravel and the convenience of the Jetstream library.
