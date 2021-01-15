FROM php:7.4-fpm
COPY php.ini /usr/local/etc/php/

RUN apt-get update && \
  apt-get -y install git unzip libzip-dev libicu-dev libonig-dev && \
  apt-get clean && \
  rm -rf /var/lib/apt/lists/* && \
  docker-php-ext-install intl pdo_mysql zip bcmath && \
  curl -sL https://deb.nodesource.com/setup_14.x -o nodesource_setup.sh && \
  bash nodesource_setup.sh && \
  apt -y install nodejs

#composerのインストール
COPY --from=composer:1.10 /usr/bin/composer /usr/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER=1 \
  COMPOSER_HOME=/composer

WORKDIR /var/www/html/laravel
