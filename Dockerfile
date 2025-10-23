FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    git curl unzip libzip-dev zip \
    libpng-dev libonig-dev libxml2-dev \
    default-mysql-client sqlite3 \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN a2enmod rewrite
COPY ./docker/apache/laravel.conf /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader
RUN cp .env.example .env || true
RUN php artisan key:generate || true
RUN chmod -R 775 storage bootstrap/cache
RUN php artisan migrate --force || true

EXPOSE 80

CMD ["apache2-foreground"]
