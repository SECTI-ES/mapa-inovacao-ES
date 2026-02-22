FROM hacklab/mapasculturais:7.7.5

COPY themes /var/www/src/themes
COPY plugins /var/www/src/plugins
COPY conf /var/www/src/conf
COPY translations /var/www/src/translations

COPY modules /var/www/src/modules

COPY docker/common/config.d /var/www/config/common.d
COPY docker/production/config.d /var/www/config/config.d
COPY docker/production/composer.json /var/www/composer.json
COPY docker/common/timezone.ini /usr/local/etc/php/conf.d/timezone.ini
COPY docker/common/php-ini.d /usr/local/etc/php/conf.d
COPY em-breve /var/www/html/em-breve

COPY docker/common/entrypoint.sh /entrypoint.sh

# WORKDIR /var/www/src
# RUN pnpm install --recursive && pnpm run build
# WORKDIR /var/www
