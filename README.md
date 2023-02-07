## Words list
```
storage/words.txt
```

## Commands to install project

1) Copy .env.example to .env
2)
```
docker-compose up -d
```
3) Go to docker container terminal
```
composer install
```
4) Go back to system terminal
```
docker-compose stop
./vendor/bin/sail up -d
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan insert:words
./vendor/bin/sail artisan load:sounds
```

## Project links
<a href="http://localhost:8888/">Home</a>
<a href="http://localhost:8888/preview">Preview</a>
<a href="http://localhost:8888/api/word">API</a>


## Check project environments
<a href="http://localhost:8888/phpinfo.php">http://localhost:8888/phpinfo.php</a>
