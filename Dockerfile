FROM mattrayner/lamp:latest

COPY .htaccess /app
COPY index.php /app
COPY api.php /app
COPY images/ /app/images
COPY css/ /app/css
COPY fonts/ /app/fonts
COPY includes/ /app/includes
COPY js/ /app/js

EXPOSE 80