FROM php:8.3-fpm

#comando para instalar na imagem algumas dependencias
RUN apt-get update && apt-get install -y \
    git \
    libzip-dev \
    zip \ 
    unzip \
    libcurl4-openssl-dev \
    gnupg 

#instalar o nodejs e npm
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

#comando para instalar o php zipado
RUN docker-php-ext-install zip

#comando para instalar o phpmyadmin
RUN docker-php-ext-install curl mysqli pdo pdo_mysql 

#ativar o pdo_mysql
RUN docker-php-ext-enable curl pdo_mysql

#instalar o composer e gerar um executável do composer na imagem
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer --no-interaction \
    && php -r "unlink('composer-setup.php');"

#expor a porta 9000 do container
EXPOSE 9000

#dar permissao 
RUN chown -R www-data:www-data \ 
    /var/www

##################
# primeiro comando para gerar a imagem do docker (depois desse arquivo aqui) 
#
# docker build -t NOME_DA_IMAGEM .
#
#
#################