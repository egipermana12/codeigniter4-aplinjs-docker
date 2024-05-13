FROM php:8.2-apache

# Update and upgrade packages
RUN apt-get update && apt-get upgrade -y

# Install CodeIgniter 4 dependencies (ext-intl, ext-gd, ext-zip)
# Enable required PHP extensions
RUN apt-get install -y libicu-dev libpng-dev libzip-dev
RUN docker-php-ext-install intl gd zip

# Add required mysqli PHP extensions
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable mod_rewrite for Apache
RUN a2enmod rewrite

# Modify php.ini to increase upload file size to 100MB
RUN echo "upload_max_filesize = 100M" > /usr/local/etc/php/conf.d/uploads.ini
RUN echo "post_max_size = 100M" >> /usr/local/etc/php/conf.d/uploads.ini

# Copy project files into container
COPY . /var/www/html


# Enable mod_rewrite for Apache
RUN a2enmod rewrite

# Copy the Apache configuration file
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

# Restart Apache
RUN service apache2 restart
