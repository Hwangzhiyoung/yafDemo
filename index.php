<?php
define("DEMO",  realpath(dirname(__FILE__) . '/')); // DEMO路径-> /data/wwwroot/Demo/
define("APP_PATH",  DEMO . "/application");
define("PRODUCT_SERVER", false);
$app  = new Yaf_Application(DEMO . "/conf/application.ini");
//print_r($app->environ());
//print_r($app);
$app->bootstrap()->run();