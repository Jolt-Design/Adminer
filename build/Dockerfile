ARG ADMINER_VERSION=4.8.4

FROM curlimages/curl-base:8.17.0 AS downloader

RUN mkdir -p /work

ARG ADMINER_VERSION

RUN curl -L -o /work/adminer.php https://github.com/adminerevo/adminerevo/releases/download/v${ADMINER_VERSION}/adminer-${ADMINER_VERSION}.php

FROM joltdesign/php:8.4 AS server

ENV LISTEN_PORT=8080

COPY --from=downloader /work/adminer.php /var/www/html/adminer.php
COPY --chown=root:root ./src/ /var/www/html/
COPY --chown=root:root ./php-conf.d/* /usr/local/etc/php/conf.d/

RUN sed -ri -e "s!<VirtualHost \*:80>!<VirtualHost *:${LISTEN_PORT}>!g" /etc/apache2/sites-available/*.conf \
    && sed -ri -e "s!Listen 80!Listen ${LISTEN_PORT}!g" /etc/apache2/ports.conf
