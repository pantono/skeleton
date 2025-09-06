FROM ubuntu:focal
MAINTAINER Chris Burton <chris.burton@revolutionbarsgroup.com>

RUN apt-get update \
 && apt-get install -y apt-transport-https ca-certificates \
 && apt-get install -y language-pack-en-base software-properties-common apt-utils


RUN apt-add-repository ppa:ondrej/php
RUN apt-get update && apt-get -y upgrade && DEBIAN_FRONTEND=noninteractive apt-get -y install inotify-tools supervisor vim unzip zip php8.3 php8.3-mysql php8.3-gd php8.3-curl curl php8.3-xml php8.3-dom git php8.3-zip php8.3-mbstring php8.3-mailparse php8.3-bcmath php8.3-soap php8.3-sybase php8.3-soap php8.3-intl libxrender-dev libxrender1 poppler-utils

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer --version

RUN sed -i "s/short_open_tag = Off/short_open_tag = On/" /etc/php/$(ls /etc/php | head -n 1)/apache2/php.ini
RUN echo "include_path = \".:/usr/share/php\"\n">>/etc/php/$(ls /etc/php | head -n 1)/apache2/php.ini
RUN echo "max_input_vars = 10000">>/etc/php/$(ls /etc/php | head -n 1)/apache2/php.ini
RUN echo "include_path = \".:/usr/share/php\"">>/etc/php/$(ls /etc/php | head -n 1)/cli/php.ini

RUN mkdir /scripts
COPY files/init-queue.sh /scripts/init.sh
COPY files/queue-watcher.sh /scripts/queue-watcher.sh
RUN chmod +x /scripts/init.sh
RUN chmod +x /scripts/queue-watcher.sh
COPY files/queue-config.conf /etc/supervisor/conf.d/queue.conf

EXPOSE 80

WORKDIR /var/www/html

CMD /scripts/init.sh
