<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Internet-Projects-Ltd-Test</h1>
    <br>
</p>

I used Yii 2 Basic Project Template as a skeleton.<br>
I integrated main project with a console of symfony.



DIRECTORY STRUCTURE
-------------------

      bin/FetchFruitsCommand.php    command for first test  
      controllers/                  written SiteController.php for two test
      views/                        written index.php and favorite.php for two test
      tests/                        written unit and functional and acceptance for two test
      models/                       written Fruit.php for two test
      migrations/                   written m230417_212618_fruits_table.php for two test
      web/                          written main.js and site.css for two test



REQUIREMENTS
------------

The minimum requirement by this project that your Web server supports PHP 7.4.<br>
You should make databases named as fruit and yii2basic_test on mysql.<br>
And should set mysql user as root and has no password.<br>
Here "Current" means the root path of project.<br>
You should set <Current>/web to document root of http.conf of Aphach or run follow command.
~~~
php -S localhost:8080 -t web
~~~
First Test : "Write a console script"
------------

### Look at the source

You can look at source in "Current"/bin/FetchFruitsCommand.php.<br>
I used the console class of a symfony framework.

You should go to "Current".
~~~
php bin/console fruits:fetch
~~~

I used sendmail as SMTP server to send email.

Second Test : "Create the pages with all fruits and favorite fruits"
------------
 I wrote controlls/SiteController.php and views/index.php and favorite.php and models/Fruit.php


Three Test : "Unit tests are welcome"
-------

Tests are located in `tests` directory. <br>They are developed with [Codeception PHP Testing Framework](http://codeception.com/).<br>
I made 3 test suites:

- `unit`
- `functional`
- `acceptance`

I made migrate for test

You should set vendor/bin to system environment.

Migrating can be executed by running

```
yii migrate
```

Tests can be executed by running

```
codecept run unit,functional
```
