<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://www.eureciclo.com.br/img/selo-horizontal.ea6b8657.png" width="400"></a></p>

</p>

## Development - Luis Paulo Santos

Api developed to return a list of products from the OLX site, it returns all products by list, through a crawler,
used unit test, PhpUnit to validate the expected result of the crawler.

## How to start the project
- Clone the project on github
https://github.com/luispaulo/Upload-TXT-Eureciclo-DOCKER.git

## Check mysql settings in the file .env:

```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravelsail
    DB_USERNAME=root
    DB_PASSWORD=123456789
```

## Install composer
```
    composer install
    npm install
```

## Set path of ALIAS
```
  alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
```

## Now you can upload the container
```
   ./vendor/bin/sail up -d
```

## Load the migrates to the database
```
  sail php artisan migrate
```

## Questions and contact
- **[Whatsapp - Luis Paulo ](https://api.whatsapp.com/send?phone=5561982481004)**
