FROM php:8.2-apache

# Install mysqli extension for MySQL database support
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Copy project files into web root
COPY . /var/www/html/

# Enable Apache rewrite module (important for routing/clean URLs)
RUN a2enmod rewrite

# Set correct ownership for Apache
RUN chown -R www-data:www-data /var/www/html/

EXPOSE 80
