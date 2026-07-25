FROM php:8.2-fpm

# Install package yang dibutuhkan Laravel
RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    zip \
    libzip-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev

# Install extension PHP
RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    mysqli \
    zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Menentukan folder kerja di dalam container
WORKDIR /var/www  