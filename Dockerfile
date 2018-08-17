FROM php:7-fpm
ENV http_proxy http://192.168.4.11:8080
ENV https_proxy http://192.168.4.11:8080
RUN apt-get update -y \
  && apt-get install -y \
    libxml2-dev \
  && apt-get clean -y \
  && docker-php-ext-install soap
