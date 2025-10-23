# Используем официальный образ PHP с Apache
FROM php:8.2-apache

# Устанавливаем системные пакеты и PHP-расширения
RUN apt-get update && apt-get install -y \
    git unzip libpq-dev libzip-dev libsqlite3-dev zip sqlite3 \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite zip

# Включаем модуль Apache для работы с .htaccess
RUN a2enmod rewrite

# Устанавливаем Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Устанавливаем рабочую директорию
WORKDIR /var/www/html

# Копируем файлы Laravel
COPY . .

# Устанавливаем зависимости проекта
RUN composer install --no-dev --optimize-autoloader

# Генерируем ключ приложения
RUN php artisan key:generate

# Выполняем миграции (если нужно при сборке)
# RUN php artisan migrate --force

# Настройки прав доступа
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Открываем порт для Render
EXPOSE 80

# Запускаем Apache
CMD ["apache2-foreground"]
