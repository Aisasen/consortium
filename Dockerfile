# Используем официальный образ PHP с Apache
FROM php:8.2-apache

# Устанавливаем зависимости
RUN apt-get update && apt-get install -y \
    git unzip libpq-dev libzip-dev zip sqlite3 \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite zip

# Устанавливаем Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Устанавливаем рабочую директорию
WORKDIR /var/www/html

# Копируем все файлы
COPY . .

# Устанавливаем зависимости Laravel
RUN composer install --no-dev --optimize-autoloader

# Копируем .env.example если .env отсутствует
RUN cp .env.example .env || true

# Генерируем ключ приложения
RUN php artisan key:generate

# Права на нужные директории
RUN chmod -R 775 storage bootstrap/cache

# Открываем порт
EXPOSE 80

# Запускаем Apache
CMD ["apache2-foreground"]
