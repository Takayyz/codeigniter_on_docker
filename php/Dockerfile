FROM php:7.4.13-fpm
LABEL maintainer "Takayyz <like.the.wind0306@gmail.com>"

RUN docker-php-ext-install mysqli
COPY --from=composer /usr/bin/composer /usr/bin/composer
# TODO: xdebug追加
