#!/bin/bash
set -m
/usr/sbin/apache2ctl -D FOREGROUND &

cd /var/www/html
composer install &

fg %1