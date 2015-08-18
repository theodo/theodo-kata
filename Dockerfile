FROM php:5.6-apache

RUN apt-get update
RUN apt-get install -y git vim
RUN apt-get install -y php5-dev
RUN pecl install zip && echo extension=zip.so > /usr/local/etc/php/conf.d/zip.ini

RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/bin/composer
RUN curl http://get.sensiolabs.org/php-cs-fixer.phar -o /usr/bin/phpcsfixer && chmod a+x /usr/bin/phpcsfixer
RUN curl https://phar.phpunit.de/phpunit.phar -o /usr/bin/phpunit && chmod a+x /usr/bin/phpunit

ADD devops/docker-symfony.conf /etc/apache2/sites-enabled/docker-symfony.conf
ADD devops/docker-symfony.ini /usr/local/etc/php/conf.d/docker-symfony.ini
RUN a2enmod rewrite
