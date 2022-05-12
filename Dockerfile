FROM mysql:8.0
FROM php:7.3-apache
RUN  apt-get update && apt-get upgrade -y
RUN docker-php-ext-install pdo_mysql
RUN a2enmod rewrite
EXPOSE 80
