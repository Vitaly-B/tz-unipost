# Запус проекта

локально прописать в файл hosts

127.0.0.1 tz-unipost

docker-compose up -d --build

__docker ps__

посмотреть какой id в контейнера с php 

__docker ps__ 

Зайти в контейнер 

__docker exec -it [id-контейнера] bash__

и установить зависимости 

__composer install__

Дальше локально по фронту в корне проекта 

__yarn install__

__yarn encore dev__


И можно заходить по адресу

http://tz-unipost/
