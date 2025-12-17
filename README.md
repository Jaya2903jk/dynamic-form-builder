# Dynamic Form Builder (Laravel + Tailwind CSS)

## Author
Jayakanthan P  
Phone: 8825816433 

## Features
- Admin can create forms with dynamic fields (text, dropdown, radio, checkbox)
- Dynamic options for dropdown, radio, and checkbox fields
- Users can fill forms dynamically
- Admin can view responses field-wise
- Tailwind UI styling for modern interface

## Installation
1. Clone the repository:
   git clone https://github.com/Jaya2903jk/dynamic-form-builder.git

2. Go into the project directory:
   cd dynamic-form-builder

3. Install PHP dependencies:
   composer install

4. Install Node dependencies & build assets:
   npm install
   npm run dev

5. Copy `.env.example` to `.env`:
   cp .env.example .env

6. Set up database in `.env`:
   DB_DATABASE=dynamic_forms
   DB_USERNAME=root
   DB_PASSWORD=

7. Run migrations:
   php artisan migrate

8. Serve the application:
   php artisan serve

## Usage
- **Admin Dashboard**: Access at `/admin`
  - Create forms dynamically
  - Add fields and options
  - View form responses
- **User Dashboard**: Access at `/dashboard`
  - View available forms
  - Fill and submit forms

## Notes
- Do not push `.env` to GitHub
- Ensure all migrations, controllers, models, views, and Tailwind JS are committed
- Include your name and phone number in README for submission


