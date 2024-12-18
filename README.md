<img src="/public/img/logo.png" width="150px" align="center">

# <h1 align="center">Vagas Tucano</h1>


# <p align="center"> Instalar projeto utilizando Docker e Nginx </p>

## Gerarando a imagem Docker

Primeiramente, utilize esse comando para gerar a imagem Docker, que nesse projeto é o `php:8.3-fpm.`

```
docker build -t nome_da_imagem .
```
Com a imagem gerada, será possível criar os containers para o projeto

## Verificando a imagem

Certifique-se que a imagem foi gerada utilizando o seguinte comando

```
docker images
```

Verifique se a imagem que você criou está listada

```
REPOSITORY                          TAG       IMAGE ID       CREATED         SIZE
nome_da_imagem                      latest    697071c8a6d7   25 hours ago    192MB
```

## Criando Containers

Após a criação da imagem, execute o comando para criar os seguintes containers
* `Banco de Dados`
* `Aplicação`
* `Nginx`

Dessa maneira, o comando vai iniciar os seviços do arquivo `docker-compose.yml` e roda as instruções para iniciar os containers

```
docker compose up -d --build
```

Verifique se os containers foram criados

```
docker compose ps
```

## Entrando no container

Para executar o container da aplicação `vagas_tucano_app` utilize o comando

```
docker exec -it vagas_tucano_app /bin/bash
```

Dessa maneira, estará dentro do container da aplicação, no diretório `/bin/bash`

## Verificando composer e php no container

Dentro do container, verifique se o composer e o php estão instalados corretamente

```
composer -v
php -v
```

## Instalando projeto Laravel no container

Se o composer estiver instalado corretamente, você já pode criar o seu projeto

```
composer create-project laravel/laravel nome-do-projeto
```

## Passando os arquivos para o diretório raiz

Copie os arquivos dentro do seu projeto para o diretório raiz, o `www`

```
cp -r nome-do-projeto/* .
```

Em seguida, remova a pasta.

```
rm -rf nome-do-projeto
```

## Verificando projeto

Para garantir que nada está faltando para o Laravel funcionar, execute

```
composer install
npm install
npm run dev
```

Dê as permissões da pasta para que assim o projeto funcione

```
chmod -R 777 *
```

## Verificando conexão do projeto

Com tudo instalado corretamente, verifique se o projeto já está rodando

```
curl -IL http://localhost:8088
```

Se estiver ok, a primeira linha deve ser algo como
`HTTP/1.1 200 OK`
