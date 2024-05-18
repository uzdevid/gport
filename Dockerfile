FROM php:8.3-fpm-alpine

RUN apk add --no-cache postgresql-dev libpng libpng-dev libjpeg-turbo libjpeg-turbo-dev freetype freetype-dev libwebp libwebp-dev zlib zlib-dev libzip-dev zip

RUN docker-php-ext-install gd zip pdo pdo_pgsql

COPY --from=composer:2.4 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

# PHP config
COPY zz-docker.conf /usr/local/etc/php-fpm.d/zz-docker.conf

RUN docker-php-ext-install pcntl

RUN apk add supervisor

RUN composer install

RUN php init --env=Production --overwrite=All --delete=All

RUN php yii migrate --interactive=0

COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf
RUN chmod +x /etc/supervisor/conf.d/supervisord.conf

RUN mkdir -p runtime/logs/supervisor/
RUN mkdir -p runtime/logs/queue/

CMD ["/usr/bin/supervisord"]