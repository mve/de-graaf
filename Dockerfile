FROM phpearth/php:7.2-nginx
RUN apk -U upgrade && \
    apk --update --no-cache add composer e2fsprogs e2fsprogs-extra nano php7.2-sodium php7.2-intl php7.2-gd php7.2-pcntl php7.2-pdo_mysql && \
    rm -rf /var/cache/apk/*

RUN chmod +w /etc/nginx/conf.d/default.conf
COPY nginx.conf /etc/nginx/conf.d/default.conf

RUN touch /etc/php/7.2/conf.d/custom.ini \
    && echo "upload_max_filesize = 10M;" >> /etc/php/7.2/conf.d/custom.ini

WORKDIR /var/www/html
COPY . /var/www/html
RUN chown -R www-data:www-data /var/www/html/
RUN composer global require hirak/prestissimo
RUN composer install
RUN composer dump-autoload --optimize
RUN sed -e 's/;clear_env = no/clear_env = no/' -i /etc/php/7.2/php-fpm.d/www.conf

VOLUME /var/www/html/storage
EXPOSE 80

COPY start.sh /start.sh
RUN chmod a+x /start.sh
ENTRYPOINT ["/start.sh"]

