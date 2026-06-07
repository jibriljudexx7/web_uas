FROM php:8.2-apache

# Install mysqli and pdo_mysql extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli pdo_mysql

# Copy source code
COPY src/ /var/www/html/

# Expose port 80 (apache default)
EXPOSE 80
