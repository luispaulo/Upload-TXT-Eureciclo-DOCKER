<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://www.eureciclo.com.br/img/selo-horizontal.ea6b8657.png" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Luis Paulo Santos

## Como iniciar o projeto
- Clonar o projeto no github
https://github.com/luispaulo/Upload-TXT-Eureciclo-DOCKER.git

## Verifique as confirguracoes mysql no arquivo .env:

```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravelsail
    DB_USERNAME=root
    DB_PASSWORD=123456789
```

## Instalar composer
```
    composer install
    npm install
```

## Definir caminho do ALIAS
```
  alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
```

## Ja pode subir o conteiner
```
   ./vendor/bin/sail up -d
```

## Carregar as migrates para o banco
```
  sail php artisan migrate
```

## CONTATOS
- **[Whatsapp - Luis Paulo ](https://api.whatsapp.com/send?phone=5561982481004)**
