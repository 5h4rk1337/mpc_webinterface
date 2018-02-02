FROM php:7.2-apache

RUN apt-get update && apt-get upgrade -y

EXPOSE 80

WORKDIR /app

COPY assets .
COPY index.php next.php play.php prev.php stop.php volume-down.php volume-up.php ./

# This VirtualHost config is adapted to symfony 4.
#COPY apache-conf/000-default.conf /etc/apache2/sites-available/000-default.conf

# This security.conf is suited for production images.
#COPY apache-conf/security.conf /etc/apache2/conf-available/security.conf

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

#RUN echo "expose_php=Off" >> /usr/local/etc/php/conf.d/security.ini
