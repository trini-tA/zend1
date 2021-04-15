# ZendFramework1
https://framework.zend.com/manual/1.12/en/reference.html

Config apache2 is very important

## config files
- Bootstrap.php
- application.ini
- public/index.php

## Layout
'''zf.sh enable layout'''
application/layouts/scripts/


## Controller
zf.sh create controller todo
Add action to controller

zf create action ActionName ControllerName

https://framework.zend.com/manual/1.12/en/zend.controller.quickstart.html

Front, BackOffice, Blog, ....
https://framework.zend.com/manual/1.12/en/zend.controller.front.html

## Model & table
Sqlite
zf configure db-adapter 'adapter=PDO_SQLITE&dbname=APPLICATION_PATH ...
mkdir -p data/db; chmod -R a+rwX data
scripts/schema.sqlite.sql
scripts/data.sqlite.sql
scripts/load.sqlite.php

zf create db-table ***
zf create model ***Mapper
zf create model ***

## Create and Load db
php scripts/load.sqlite.php --withdata

## Forms
zf.sh create form 

## Router
https://framework.zend.com/manual/1.12/fr/zend.controller.router.html

## Grunt
https://internetdevels.com/blog/configuring-grunt-for-compiling-sass-less-to-css
apt-get install ruby-sass
https://www.taniarascia.com/getting-started-with-grunt-and-sass/

## Helps

Zend_Debug::dump($var, $label = null, $echo = true);
https://framework.zend.com/manual/1.12/en/zend.navigation.pages.html
https://framework.zend.com/manual/1.12/en/zend.layout.options.html
https://codeutopia.net/blog/2008/10/23/complex-custom-elements-in-zend_form/