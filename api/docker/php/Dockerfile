FROM php:8.3-fpm-alpine

RUN apk update && apk --no-cache add bash

RUN apk add --no-cache --virtual .build-deps $PHPIZE_DEPS \
    &&  apk add --no-cache --update linux-headers
RUN apk del -f .build-deps

RUN curl -sS https://getcomposer.org/installer -o composer-setup.php
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN rm -rf composer-setup.php

EXPOSE 9000
