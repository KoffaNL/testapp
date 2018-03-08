FROM ubuntu:12.04

RUN apt-get update -y && apt-get install -y curl git apache2 php5 libapache2-mod-php5 php5-mcrypt php5-mysql python unzip

RUN rm -rf /var/www/*
ADD www /var/www

RUN a2enmod rewrite
RUN chown -R www-data:www-data /var/www
ENV APACHE_RUN_GROUP www-data
ENV APACHE_RUN_USER www-data
ENV APACHE_LOG_DIR /var/log/apache2

EXPOSE 80

CMD ["/usr/sbin/apache2", "-D",  "FOREGROUND"]
