## About Test Task

Simple Blog with CRUD. Software stack is: Laravel and Vue.js.

## Installation

If you do not have a php and composer:

./setup.sh

This command installs Laravel Sail. Now you can use it.

./vendor/bin/sail up -d
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate --seed
./vendor/bin/sail npm install
./vendor/bin/sail npm run build
