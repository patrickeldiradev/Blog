
# PHP Exercise
PHP Exercise based on Laravel framework.  

## Installation
**Use this steps for installations**

- Install composer dependencies.  (This project depends on [laravel sail](https://laravel.com/docs/9.x/sail) package which should be installed by composer.)
  [Learn more](https://laravel.com/docs/9.x/sail#installing-composer-dependencies-for-existing-projects)

```bash  
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
 ```  

- Add .env file and generate key.
```bash  
$ cp .env.example .env
$ ./vendor/bin/sail php artisan key:generate
 ```  

- Add database credentials to .env file.
```bash  
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
 ```  



- Build and run docker.
```bash  
$ ./vendor/bin/sail up
 ```  

- Run jobs and queues watcher.
 ```bash  
$ ./vendor/bin/sail php artisan queue:work 
$ ./vendor/bin/sail php artisan schedule:work
 ```  

## Code quality helper commands

Using some tools to check code quality (Unit Test - Code Sniffer - Code analyzer).
- Unit Test.

```bash  
$ ./vendor/bin/sail php artisan test
```


- [laravel-ide-helper](https://github.com/barryvdh/laravel-ide-helper).
```bash  
$ ./vendor/bin/sail php artisan ide-helper:generate
$ ./vendor/bin/sail php artisan ide-helper:models
$ ./vendor/bin/sail php artisan ide-helper:meta
```

- [PHP Code Sniffer](https://github.com/squizlabs/PHP_CodeSniffer).
```bash  
$ ./vendor/bin/sail php ./vendor/bin/phpcs // Code sniffer check.
$ ./vendor/bin/sail php ./vendor/bin/phpcbf // Code sniffer Fix.
```
- Code analyzer ([phpStan](https://phpstan.org/)).
```bash  
$ ./vendor/bin/sail php ./vendor/bin/phpstan analyse -l 6 // Code analyzer.
```

