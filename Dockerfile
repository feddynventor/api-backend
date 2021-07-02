FROM php:7.4

RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql
RUN docker-php-ext-install sockets
COPY . /opt/backend

ENV TZ=Europe/Rome

WORKDIR /opt/backend
ENTRYPOINT [ "php","-S","0.0.0.0:8000" ]