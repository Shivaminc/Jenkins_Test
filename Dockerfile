# Use an official PHP runtime as a parent image
FROM php:8.1-apache

# Set the working directory
WORKDIR /var/www/html

# Copy the current directory contents into the container at /var/www/html
COPY . /var/www/html

# Install any needed packages (e.g., Composer)
# RUN apt-get update && apt-get install -y libpng-dev
# RUN docker-php-ext-install pdo pdo_mysql

# Set file permissions
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html

# Expose port 80
EXPOSE 80
