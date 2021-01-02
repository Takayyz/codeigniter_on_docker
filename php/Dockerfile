FROM php:7.4.13-fpm
LABEL maintainer "Takayyz <like.the.wind0306@gmail.com>"

RUN docker-php-ext-install mysqli
RUN pecl install xdebug && docker-php-ext-enable xdebug

COPY --from=composer /usr/bin/composer /usr/bin/composer
