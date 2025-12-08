# Dockerfile for PHP

FROM php:8.4-fpm

RUN apt-get update && apt-get install -y \
    git zip unzip curl \
    libzip-dev libonig-dev \
    && docker-php-ext-install pdo pdo_mysql \
    && pecl install redis \
    && docker-php-ext-enable redis

# Fügt unsere korrigierte Konfiguration hinzu und überschreibt die Standarddatei
COPY fpm-pool.conf /usr/local/etc/php-fpm.d/zzz-docker.conf
# Wenn fpm-pool.conf im gleichen Ordner wie das Dockerfile liegt,
# wird es in das FPM-Konfigurationsverzeichnis kopiert.

COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

WORKDIR /var/www/html


