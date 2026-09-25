FROM php:8.2-apache

# Install system dependencies and PHP extensions needed for MySQLi and Composer
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libonig-dev \
    libzip-dev \
    unzip \
    git \
    && docker-php-ext-install mysqli pdo_mysql intl mbstring zip

# Install Composer globally
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Enable Apache Rewrite Module
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy composer files first to leverage Docker caching
COPY composer.json composer.lock ./

# Install project dependencies
RUN composer install --no-dev --optimize-autoloader

# Copy the rest of the project files into the container
COPY . /var/www/html/

# Update Apache document root to point to CodeIgniter's public folder
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -s 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -s 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# Give proper permissions to writable directory
RUN chmod -R 777 /var/www/html/writable

# Expose port 80
EXPOSE 80