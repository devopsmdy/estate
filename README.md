1. cp .env.example ./.env (config the env)
2. composer install
3. php artisan key:generate
4. sudo chgrp -R www-data storage bootstrap/cache
5. sudo chmod -R ug+rwx storage bootstrap/cache
6. php artisan storage:link
7. be careful of the storge file
8. sudo certbot certonly --webroot --webroot-path=/var/www/html/estate -d arzheng.ml -d www.arzheng.ml
