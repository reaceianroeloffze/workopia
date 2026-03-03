# Workopia

Workopia is a job-listing and management application built using Laravel.

### Credits

This project was developed as part of
the [Laravel From Scratch (O'Reilly Version)](https://learning.oreilly.com/course/laravel-from-scratch/9781836640035/)
course by Brad
Traversy.

### Modern Updates

As of adding this project to GitHub, the following updates have been made:

- **Laravel 12** features
- **Tailwind CSS v4** (using the new `@tailwindcss/vite` plugin)
- **Vite v7** for asset bundling and hot reloading

### Prerequisites
Ensure you have the following installed before running this project:
- PHP 8.2+
- Composer
- Node.js & npm

### How to Run This Project Locally

1. **Clone the repo**
2. **Install PHP dependencies**:
   ```bash
    composer install
   ```
3. **Install frontend dependencies**:
   ```bash
    npm install
   ```
4. **Environment Setup**:
    - Copy `.env.example` to `.env`.
    - Run `php artisan key:generate` to generate your application key.
5. **Database Setup**:
    - Configure your database connection in `.env`.
    - Run `php artisan migrate` to create the database tables.
6. **Start the development servers**:
    - Run `php artisan serve` to start the PHP server.
    - Run `npm run dev` in a separate terminal to start the Vite development server for Tailwind CSS and other frontend assets.
    - Open http://localhost:8000 in your browser to view the application.