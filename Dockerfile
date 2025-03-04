FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-install pdo mbstring exif pcntl bcmath gd mysqli pdo_mysql

RUN curl -sL https://deb.nodesource.com/setup_16.x | bash - && apt-get install -y nodejs

RUN pecl install redis && docker-php-ext-enable redis

WORKDIR /var/www/html

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . .

RUN chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache

COPY .env.example .env

RUN composer install --no-dev --optimize-autoloader

RUN php artisan key:generate

EXPOSE 9000

CMD ["php-fpm"]
