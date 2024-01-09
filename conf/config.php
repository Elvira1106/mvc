<?php
session_start();
//служебные константы                                              
define("ROOT","D:/mvc");
define("CONTROLLER_PATH", ROOT."/controlles/");
define("MODEL_PATH", ROOT."/models/");
define("VIEW_PATH", ROOT."/view/");
define("UPLOAD_FOLDER", ROOT. "/uploads/");

 require_once("db.php");
 require_once("route.php");
 
 //подключение встроенных контроллеров, моделей
 require_once MODEL_PATH.'Model.php';
 require_once VIEW_PATH.'View.php';
 require_once CONTROLLER_PATH.'Controller.php';

 Routing::buildRoute(); //запуск роутинга