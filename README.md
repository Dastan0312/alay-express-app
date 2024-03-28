# Setting Up and Running Your Laravel Application

This guide provides step-by-step instructions for setting up and running your Laravel application. It covers database migration, seeding, npm installation, serving the application, compiling assets, running the queue worker, and includes admin credentials for accessing privileged functionalities.

## Prerequisites

- Laravel installed on your system
- Composer installed on your system
- Node.js and npm installed on your system
- Basic understanding of Laravel and its components

## Step 1: Database Migration
`php artisan migrate`

Ensure that your database is properly configured in your `.env` file. Then, run the following Artisan command to migrate your database:


This command will execute all pending migrations and create necessary database tables.

## Step 2: Database Seeding

Optionally, if you have seeders set up to populate your database with sample data, run the following Artisan command:

`php artisan db:seed`

This command will execute all database seeders specified in your Laravel application.

## Step 3: NPM Installation

If your project uses npm packages for frontend assets (e.g., JavaScript and CSS), navigate to your project directory and run the following command to install npm dependencies:

`npm install`

This command will read the `package.json` file and install all required dependencies.

## Step 4: Serve the Application

To run your Laravel application locally, use the following Artisan command to serve it on a development server:

`php artisan serve`

This will start a development server at `http://127.0.0.1:8000/` by default.

## Step 5: Compile Assets

If your project includes frontend assets that need to be compiled (e.g., JavaScript files, CSS preprocessors), run the following npm command:

`npm run dev`

Alternatively, you can use `npm run watch` to automatically recompile assets whenever changes are detected.

## Step 6: Run the Queue Worker

If you have background jobs that need to be processed (e.g., email sending), you need to run the queue worker. Use the following Artisan command to start the queue worker:

`php artisan queue:work --queue=emails`

This command will start processing queued jobs.

## Admin Credentials

To access the admin dashboard, use the following credentials:

- **Email:** admin@example.com
- **Password:** admin123

You can use these credentials to log in as an administrator and access privileged functionalities within the application.


