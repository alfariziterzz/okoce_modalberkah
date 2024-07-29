# Gunakan image dasar dari PHP 8.2 dengan Apache
FROM php:8.3-apache

# Set label untuk informasi tambahan tentang image
LABEL maintainer="your-email@example.com"

# Install dependencies dasar
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libonig-dev \
    libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo mbstring zip exif pcntl gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install Xdebug
RUN pecl install xdebug && docker-php-ext-enable xdebug

# Konfigurasi Xdebug
RUN echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Set lingkungan kerja
WORKDIR /var/www/html

# Copy file konfigurasi Apache untuk Laravel
COPY ./laravel.conf /etc/apache2/sites-available/000-default.conf

# Enable mod_rewrite Apache
RUN a2enmod rewrite

# Set hak akses untuk folder
ARG WWWGROUP=1000
RUN usermod -u 1000 www-data && groupmod -g ${WWWGROUP} www-data

# Expose port 80
EXPOSE 80

# Perintah default untuk menjalankan container
CMD ["apache2-foreground"]
