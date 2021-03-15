# docker/symfony/Dockerfile
FROM php:7.4-cli

RUN  apt-get update -y && \
     apt-get clean

RUN apt-get install -y zip \
    unzip \
    curl \
    && rm -rf /var/lib/apt/lists/*


RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

#set working directory
WORKDIR /usr/src/pouya
#copy codes to dockers
COPY . /usr/src/pouya

RUN composer install
