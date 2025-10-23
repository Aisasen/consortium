# Используем официальный PHP-образ с Apache
FROM php:8.2-apache

# Устанавливаем зависимости, нужные Laravel
RUN apt-get update && apt-get install -y \
    git unzip libpq-dev libzip-dev zip sqlite3 \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite zip

# Устанавливаем Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Копируем проект в контейнер
WORKDIR /var/www/html
COPY . .

# Устанавливаем зависимости Laravel
RUN composer install --no-dev --optimize-autoloader

# Генерируем ключ приложения
RUN php artisan key:generate || true

# Делаем storage и bootstrap/cache доступными для записи
RUN chmod -R 777 storage bootstrap/cache

# Открываем порт
EXPOSE 80

# Запускаем Apache
CMD ["apache2-foreground"]
