# LOCAL DEVELOPMENT SET UP GUIDE

This is source has been made to share and run developers between different environment . 


## Requirements 

You don't need to spend time, installing all the required servers and packages . This application has already been set up work with docker easily . Just docker compose and it will do the rest.  If you don't have docker and docker-compose already installed on your computer,  please get [here](https://docs.docker.com/get-docker/)!


## Environment Settings
- Apache 2.4.25
- MariaDB 10.2
- PHP 7.0.32

## Setting database to import automatically 
 
 Please place you database dump file into **docker/mariadb/dumps**. So , once you run docker-compose . 
 database will be automatically created and import 


## Running The Application 

All required set up are already in docker-compose.yml . You just need to run :

```bash
$ cd docker

$ docker-compose up -d --build 
```

There you go! You can now see you application on http://localhost:8100 . if you want to run on different port , 
feel free to change it on docker-compose.yml

```yml
web:
    build: ./docker/web/
    volumes:
      - ./:/var/www/html/
      - ./docker/web/apache.conf:/etc/apache2/sites-enabled/stj_admin.conf
    ports:
      - "8100:80" 
```

In the above code , you change change 8100:80 to whatever post you want for example : 7500:80 
```yml
    ports:
      - "7500:80" 
```

Then , you can access like  http://localhost:7500. 

## Database Username and Passwords
You can check database's name , username & password to whatever you want . Please just check yml file 

```yml
	MYSQL_ROOT_PASSWORD: root
    MYSQL_DATABASE: stj_ecphp_v2
    MYSQL_USER: stj_admin
    MYSQL_PASSWORD: stj_admin
	MYSQL_HOST: mariadb-stj_admin
  
```

**Enjoy!** 