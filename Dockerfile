# ���������� ����������� ����� PHP � Apache
FROM php:8.2-apache

# ������������� ��������� ������ � PHP-����������
RUN apt-get update && apt-get install -y \
    git unzip libpq-dev libzip-dev libsqlite3-dev zip sqlite3 \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite zip

# �������� ������ Apache ��� ������ � .htaccess
RUN a2enmod rewrite

# ������������� Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# ������������� ������� ����������
WORKDIR /var/www/html

# �������� ����� Laravel
COPY . .

# ������������� ����������� �������
RUN composer install --no-dev --optimize-autoloader

# ���������� ���� ����������
RUN php artisan key:generate

# ��������� �������� (���� ����� ��� ������)
# RUN php artisan migrate --force

# ��������� ���� �������
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# ��������� ���� ��� Render
EXPOSE 80

# ��������� Apache
CMD ["apache2-foreground"]
