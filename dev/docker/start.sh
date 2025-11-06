#!/bin/bash

chown -R www-data:www-data /var/www/public/*

cd /var/www/src
pnpm install --recursive
pnpm run dev
cd ../../..

php -S 0.0.0.0:80 -t /var/www/html /var/www/dev/router.php