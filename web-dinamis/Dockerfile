FROM php:8.2-apache

# Install mysqli and pdo_mysql extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy source code
COPY src/ /var/www/html/

# Expose port 80 (apache default)
EXPOSE 80
