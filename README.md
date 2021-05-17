# redis-cache-php

This is an test of caching with Redis.

For running this project you need have Redis installed in your environment.

Running Redis on your local environment:

```
$ brew services start redis

or

$ sudo apt-get install redis-tools
$ sudo apt install redis-server
$ sudo systemctl start redis

or using docker

$ docker container run -it --name redis_db -p 6379:6379 -d redis

```

Install the dependencies of PHP

```
$ composer install

$ php -S localhost:8080
```

Open in

`http://localhost:8080/`

