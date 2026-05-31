FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring xml

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY core/ .

RUN mkdir -p public storage/logs storage/framework/cache storage/framework/sessions storage/framework/views bootstrap/cache

RUN COMPOSER_ALLOW_SUPERUSER=1 composer install --no-dev --optimize-autoloader

RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 8000

CMD php -S 0.0.0.0:${PORT:-8000} -t public