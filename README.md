# Droppy

## 1. Overview
Before writing any code have a look at the [code guidelines](guidelines) that are to be used.

## 2. Setup
1. Clone the repository using `git clone https://github.com/cgavir29/droppy.git`
2. Create a MySQL database with **name** = 'droppy', **username** = 'root' and **password** = '' (empty) if you don't want to make changes to the `.env` file.
3. Run the following commands.
    1. `cd droppy`
    2. `cp .env.example .env`. Modify `.env` as you see fit.
    3. `composer install`
    4. `npm install`
    5. `npm run dev`
    6. `php artisan key:generate`
    7. `php artisan migrate`
    8. `php artisan db:seed`
    9. `php artisan storage:link`
    10. `php artisan serve`
