<?php
//класс маршрутизации
class Routing{
    public static function buildRoute() {
        //Контроллер по умолчанию 
        $controllerName = "IndexController";
        $modelName = "IndexModel";
        $action = "index";

        $route = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); //возвращает url адрес
        $i = count($route)-1;
        while($i>0) {
            if($route[$i] != 'index.php') {
                if(is_file(CONTROLLER_PATH . ucfirst($route[$i]) . "Controller.php")) {
                    $controllerName = ucfirst($route[$i]) . "Controller";
                    $modelName =  ucfirst($route[$i]) . "Model";
                    break;
                } else {
                     $action = $route[$i];
                }
            }
            $i--;
        }
      
        require_once CONTROLLER_PATH . $controllerName . ".php"; //получаем контроллер, который получили раннее
        require_once MODEL_PATH . $modelName . ".php"; //получаем модель, которую получили раннее
     
        $controller = new $controllerName();
        $controller->$action(); // $controller->users(), возвращает метод
    }

    public function errorPage()
    {
        
    }
}