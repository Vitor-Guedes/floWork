# Use the official PHP 8.3 FPM Alpine image as the base
FROM php:8.3-fpm-alpine

# Install system dependencies required for PHP extensions and Laravel
RUN apk add --no-cache \
    bash \
    curl \
    libpng-dev \
    libzip-dev \
    oniguruma-dev \
    zlib-dev

# Install common PHP extensions required by Laravel
RUN docker-php-ext-install \
    pdo_mysql \
    zip \
    gd \
    mbstring \
    exif \
    pcntl \
    bcmath

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set the working directory inside the container
WORKDIR /var/www

# Copy the application code into the container
COPY ./app /var/www

# Install Laravel dependencies using Composer
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Set appropriate permissions for storage and bootstrap/cache directories
# RUN chown -R www-data:www-data storage bootstrap/cache \
#     && chmod -R 775 storage bootstrap/cache

# Expose the PHP-FPM port
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]