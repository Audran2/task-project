FROM php:8.1-fpm

RUN apt-get update && apt-get install -y \
    unzip \
    git \
    libpq-dev \
    libzip-dev \
    libonig-dev \
    curl \
    && docker-php-ext-configure zip \
    && docker-php-ext-install pdo pgsql pdo_pgsql zip mbstring bcmath

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

COPY . .

COPY .env.example .env

RUN composer install --no-interaction --prefer-dist

RUN mkdir -p storage \
    && mkdir -p bootstrap/cache

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

EXPOSE 9000

CMD ["sh", "-c", "php artisan key:generate && php artisan migrate:fresh --force && php artisan serve --host=0.0.0.0 --port=${PORT:-8000}"]
