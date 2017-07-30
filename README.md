yii2 rss test
============================
Get channel items cache and show. Let users comment them.


Installation
---------
1. `git clone https://github.com/opiy-org/rss-test-yii.git`
2. `composer install`
3. create database 
4. `cp .env.example  .env`
5. edit `.env` and adjust settings
6. `php yii migrate`
7. create vhost and point it's `DocumentRoot` directory to `./web`
8. if Apache - set `AllowOverride All` directive to vhost