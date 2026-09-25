FROM php:8.2-apache

# Install system dependencies and PHP extensions needed for MySQLi
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libonig-dev \
    libzip-dev \
    unzip \
    git \
    && docker-php-ext-install mysqli pdo_mysql intl mbstring zip

# Enable Apache Rewrite Module
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy your CodeIgniter project files into the container web root
COPY myproject/ /var/www/html/

# Update Apache document root to point to CodeIgniter's public folder
ENV APACHE_DOCUMENT_SOURCE /var/www/html/public
RUN sed -ri -s 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -s 's!/var/www/!/var/www/html/public!g' /etc/apache2/apache2.conf

# Give proper permissions to CodeIgniter's writable directory
RUN chmod -R 777 /var/www/html/writable

# Expose port 80
EXPOSE 80