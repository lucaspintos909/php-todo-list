FROM php:8.0.3-apache
RUN apt-get update && \ 
    docker-php-ext-install mysqli && \
    docker-php-ext-enable mysqli