FROM php:7.1-fpm-alpine

RUN set -x \
    && apk add --no-cache --virtual .build-deps postgresql-dev \
    && docker-php-ext-install pdo pdo_pgsql \
    && apk add --no-cache postgresql-libs \
    && apk del .build-deps
