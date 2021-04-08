FROM php:8.0-fpm

MAINTAINER Jamshid Namazov <jamwid07@gmail.com>

ARG APCU_VERSION=5.1.20

RUN apt-get update && apt-get install -y \
        unzip curl\
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libzip-dev \
        libpng-dev \
        libicu-dev \
        libpq-dev \
        libxpm-dev \
        libonig-dev \
        libvpx-dev \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install -j$(nproc) intl \
    && docker-php-ext-install -j$(nproc) zip \
    && docker-php-ext-install -j$(nproc) pgsql \
    && docker-php-ext-install -j$(nproc) pdo_pgsql \
    && docker-php-ext-install -j$(nproc) exif \
    && docker-php-ext-install -j$(nproc) mbstring \
    && docker-php-ext-configure gd \
    && pecl install xdebug apcu-${APCU_VERSION}\
    && docker-php-ext-enable xdebug apcu

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

COPY ./ /var/www/html
WORKDIR /var/www/html

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
RUN composer install --no-interaction

CMD ["php-fpm"]

EXPOSE 9009