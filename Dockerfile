# ���������� ����������� ����� PHP � Apache
FROM php:8.2-apache

# ������������� �����������
RUN apt-get update && apt-get install -y \
    git unzip libpq-dev libzip-dev zip sqlite3 \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite zip

# ������������� Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# ������������� ������� ����������
WORKDIR /var/www/html

# �������� ��� �����
COPY . .

# ������������� ����������� Laravel
RUN composer install --no-dev --optimize-autoloader

# �������� .env.example ���� .env �����������
RUN cp .env.example .env || true

# ���������� ���� ����������
RUN php artisan key:generate

# ����� �� ������ ����������
RUN chmod -R 775 storage bootstrap/cache

# ��������� ����
EXPOSE 80

# ��������� Apache
CMD ["apache2-foreground"]
