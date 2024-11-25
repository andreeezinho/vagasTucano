#gerar a partir da ultima versao do NGINX
FROM nginx:latest

#adicionar no container
ADD ./nginx/default.conf /etc/nginx/conf.d/default.conf

#copiar pasta public(laravel) para o dir /www
COPY public /var/www/public