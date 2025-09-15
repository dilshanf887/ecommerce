Product Inventory System with Basic Pricing Engine

### Steps to run project

1. Make a copy of .env.example as .env
2. Install php dependencies ````composer install````
3. Add database tables ````php artisan migrate````
4. Add test data ````php artisan db:seed````
5. Generate application key ````php artisan key:generate````
5. Start the application with ````php artisan serve````