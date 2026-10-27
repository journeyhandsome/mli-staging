FROM php:7.4-fpm-alpine3.12

WORKDIR /var/www/html

RUN apk add --no-cache ttf-freefont openssh libxml2-dev autoconf g++ imagemagick imagemagick-dev libtool make pcre-dev nodejs npm git libzip-dev zip freetype \
    freetype-dev libjpeg-turbo libjpeg-turbo-dev libpng libpng-dev libc6-compat \
    && docker-php-ext-configure gd \
    && docker-php-ext-install pdo pdo_mysql soap zip gd 

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

RUN chmod -R 775 /var/www/html

