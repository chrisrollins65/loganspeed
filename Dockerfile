FROM php:8.5-apache

# Enable Apache modules needed for Laravel (pretty URLs)
RUN a2enmod rewrite

# Install system dependencies (including Node.js and npm for asset building)
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libzip-dev \
    libonig-dev \
    nodejs \
    npm \
    && rm -rf /var/lib/apt/lists/*

# Configure and install PHP extensions for Laravel
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo_mysql mbstring exif zip

# Set the working directory
WORKDIR /var/www/html

# Copy composer from the official composer image
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy application source
COPY . /var/www/html

# Ensure Laravel runtime directories exist before running artisan scripts
RUN mkdir -p /var/www/html/storage/framework/cache/data \
    /var/www/html/storage/framework/sessions \
    /var/www/html/storage/framework/views \
    /var/www/html/bootstrap/cache && \
    chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache && \
    chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Install PHP dependencies (include dev deps for local dev)
RUN composer install --no-interaction --no-progress --prefer-dist

# Set Apache document root to the Laravel public directory
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf /etc/apache2/conf-available/*.conf

EXPOSE 80
CMD ["apache2-foreground"]
