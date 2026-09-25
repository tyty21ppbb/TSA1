FROM php:8.2-apache

# Install required system packages and PHP extensions
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl pdo pdo_mysql mysqli zip

# Install Composer inside the Docker container
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Enable Apache mod_rewrite for CodeIgniter routing
RUN a2enmod rewrite

# Copy application files to Apache web root
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html

# Run Composer to install dependencies (including vendor/codeigniter4)
RUN composer install --no-dev --optimize-autoloader

# Update Apache document root to point to public/
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/conf-available/*.conf

# Set directory permissions for CodeIgniter
RUN chown -R www-data:www-data /var/www/html/writable

EXPOSE 80
