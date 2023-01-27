# About Project
Api users

## Required

* PHP >= 8.1
* Composer >= 2
* make >= 4

## Install and start project
* `Необходимо добавить строчку в файле /etc/hosts 127.0.0.1 laravel-docker.ru`
* `Необходимо выполнить в корне проекта make setup`


## Tests and lint

* `make lint - запуск codeSniffer`
* `make lint-fix - запуск исправления codeSniffer`
* `make test - запуск тестов`
* `test-coverage - запуск тестов с покрытием`

## Описание

### Используемые технологии

* Docker 20.10.22
* PHP 8.1.1-fpm-alpine
* Nginx stable-alpine
* Redis 6-alpine
* PostgreSQL postgres:13-alpine

### Функциональность

Программа принимает данные от любого клиента по HTTP протоколу через архитектуру REST API.

Архитектура приложения: REST API -> контроллер -> модель -> база данных.

REST API построен в формате JSON.

В качестве модели, взаимодействующей с базой данных, выступает класс User.

Асинхронность обеспечивается механизмом jobs, который позволяет использовать многопоточность данных.

Тестирование происходит с помощью интеграционных тестов.


