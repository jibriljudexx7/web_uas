FROM php:8.2-apache

# Install mysqli extension
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Copy source code
COPY src/ /var/www/html/

# Expose port 80 (apache default)
EXPOSE 80
