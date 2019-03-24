FROM php:7.2-apache
COPY index.php /var/www/html/
COPY css/ /var/www/html/css
COPY fonts/ /var/www/html/fonts
COPY includes/ /var/www/html/includes
COPY js/ /var/www/html/js

EXPOSE 80