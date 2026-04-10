#!/bin/bash

docker-compose -f docker-compose.prod.yml up --detach --remove-orphans

# sudo docker-compose -f docker-compose.prod.yml exec mapasculturais chown -R www-data:www-data /var/www/composer.json
# sudo docker-compose -f docker-compose.prod.yml exec mapasculturais chown -R www-data:www-data /var/www/config
# sudo docker-compose -f docker-compose.prod.yml exec mapasculturais chown -R www-data:www-data /var/www/config/
# sudo docker-compose -f docker-compose.prod.yml exec mapasculturais chown -R www-data:www-data /var/www/public
# sudo docker-compose -f docker-compose.prod.yml exec mapasculturais chown -R www-data:www-data /var/www/html/
# sudo docker-compose -f docker-compose.prod.yml exec mapasculturais chown -R www-data:www-data /var/www/var/
# sudo docker-compose -f docker-compose.prod.yml exec mapasculturais chown -R www-data:www-data /var/www/src/plugins/
sudo docker-compose -f docker-compose.prod.yml exec mapasculturais chown -R www-data:www-data /var/www/
sudo docker-compose -f docker-compose.prod.yml exec mapasculturais chmod -R +w /var/www/html/assets
sudo docker-compose -f docker-compose.prod.yml exec --workdir /var/www mapasculturais composer.phar require php-curl-class/php-curl-class
sudo docker-compose -f docker-compose.prod.yml exec --workdir /var/www mapasculturais composer.phar require phpoffice/phpspreadsheet:"^2.4" --no-update
#sudo docker-compose -f docker-compose.prod.yml exec --workdir /var/www/src mapasculturais pnpm store prune
sudo docker-compose -f docker-compose.prod.yml exec --workdir /var/www/src mapasculturais pnpm --recursive install
sudo docker-compose -f docker-compose.prod.yml exec --workdir /var/www/src mapasculturais pnpm run build
#sudo docker-compose -f docker-compose.prod.yml exec --workdir /var/www mapasculturais ./scripts/deploy.sh
# sudo docker-compose -f docker-compose.prod.yml exec --workdir /var/www mapasculturais sh -c "composer.phar update && composer.phar install --prefer-dist --no-dev && composer.phar dump-autoload --optimize"
# sudo docker-compose -f docker-compose.prod.yml exec --workdir /var/www mapasculturais ./scripts/compile-sass.sh
# sudo docker-compose -f docker-compose.prod.yml exec --workdir /var/www mapasculturais ./scripts/db-update.sh
# sudo docker-compose -f docker-compose.prod.yml exec --workdir /var/www mapasculturais ./scripts/mc-db-updates.sh