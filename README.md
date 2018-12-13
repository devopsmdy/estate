1. cp .env.example ./.env (config the env)
2. composer install
3. php artisan key:generate
4. sudo chown -R $USER:www-data storage
5. php artisan storage:link
6. be careful of the storge file
