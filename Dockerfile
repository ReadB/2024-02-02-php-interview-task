FROM php:8-apache
 
RUN apt-get update && apt-get install -y \
    git \
    zip \
    curl

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

COPY --from=composer /usr/bin/composer /usr/bin/composer
