#!/bin/bash
while true; do

inotifywait -e modify,create,delete -r /var/www/html/src && supervisorctl restart queue-consumer:*

done
