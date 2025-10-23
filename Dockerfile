FROM php:8.2-apache

# Отключаем интерактивный режим и обновляем пакеты
ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get install -y \
    git curl unzip zip sqlite3 libzip-dev libpng-dev libonig-dev libxml2-dev mariadb-client \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite zip \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN a2enmod rewrite

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader
RUN cp .env.example .env || true
RUN php artisan key:generate || true
RUN chmod -R 775 storage bootstrap/cache
RUN php artisan migrate --force || true

EXPOSE 80

CMD ["apache2-foreground"]
