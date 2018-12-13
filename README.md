1. cp .env.example ./.env
2. php artisan key:generate
3. sudo chown -R $USER:www-data storage
4. php artisan storage:link
5. php artisan migrate
6. be careful of the storge file
