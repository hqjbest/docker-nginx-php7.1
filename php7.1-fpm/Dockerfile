FROM php:7.1-fpm

#RUN apt-get update && apt-get install -y \
#    nginx \
#    && rm -rf /var/lib/apt/lists/*
RUN chown -R www-data:www-data /var/www/html

COPY php.ini /usr/local/etc/php/php.ini
# 自定义加密扩展
COPY xcrypto.so /usr/local/etc/php/xcrypto.so

RUN apt-get upgrade -yqq

RUN apt-get update -yqq

# Install developer dependencies
RUN apt-get install -yqq libsqlite3-dev libxml2-dev libicu-dev libfreetype6-dev libjpeg62-turbo-dev libpng-dev libcurl4-gnutls-dev libbz2-dev libssl-dev libpq-dev

RUN apt-get install -yqq  vim curl wget sudo unzip python

# Install PHP modules
RUN docker-php-ext-install pdo pdo_mysql json bcmath xml zip bz2 mbstring curl

RUN docker-php-ext-install phar
RUN pecl channel-update pecl.php.net
RUN pecl install xdebug-2.9.8 && docker-php-ext-enable xdebug

RUN touch /usr/local/etc/php/conf.d/xdebug.ini; \
    echo xdebug.remote_enable=1 >> /usr/local/etc/php/conf.d/xdebug.ini; \
    echo xdebug.profiler_enable=0 >> /usr/local/etc/php/conf.d/xdebug.ini; \
    echo xdebug.remote_host="10.0.1.1" >> /usr/local/etc/php/conf.d/xdebug.ini; \
    echo xdebug.remote_port=9000 >> /usr/local/etc/php/conf.d/xdebug.ini; \
    echo xdebug.remote_log=/tmp/php-xdebug.log >> /usr/local/etc/php/conf.d/xdebug.ini; \
    echo xdebug.idekey=PHPSTORM >> /usr/local/etc/php/conf.d/xdebug.ini; \
    echo xdebug.remote_autostart=1 >> /usr/local/etc/php/conf.d/xdebug.ini;
RUN echo export PHP_IDE_CONFIG="serverName=xiaohe" >> /root/.bashrc
RUN echo export XDEBUG_CONFIG="idekey=PHPSTORM" >> /root/.basic

RUN echo alias ll=\'ls $LS_OPTIONS -al\' >> /root/.bashrc