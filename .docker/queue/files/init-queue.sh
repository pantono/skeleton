#!/bin/bash
set -m
cd /var/www/html && composer install
tail -f /var/www/html/cache/message-consumer.log &
/usr/bin/supervisord &
/scripts/queue-watcher.sh
