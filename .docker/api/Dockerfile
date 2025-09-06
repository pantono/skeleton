FROM ubuntu:jammy
MAINTAINER Chris Burton <csburton@gmail.com>

RUN apt-get update \
 && apt-get install -y apt-transport-https ca-certificates \
 && apt-get install -y language-pack-en-base software-properties-common apt-utils


RUN apt-add-repository ppa:ondrej/php
RUN apt-get update && apt-get -y upgrade && DEBIAN_FRONTEND=noninteractive apt-get -y install vim unzip zip php8.3 apache2 php8.3-mysql php8.3-gd php8.3-curl curl php8.3-xml php8.3-dom git php8.3-zip php8.3-mbstring php8.3-mailparse php8.3-bcmath php8.3-soap php8.3-sybase php8.3-soap php8.3-intl php8.3-imagick libxrender-dev libxrender1

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer --version

RUN a2enmod rewrite
RUN a2enmod env
RUN a2enmod headers
COPY files/apache-config.conf /etc/apache2/sites-enabled/000-default.conf


RUN mkdir /scripts
COPY files/init.sh /scripts/init.sh
RUN chmod +x /scripts/init.sh

EXPOSE 80

WORKDIR /var/www/html

CMD /scripts/init.sh
