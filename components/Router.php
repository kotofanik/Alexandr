<?php


class Router
{
    public $routes;


    public function __construct()
    {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);

    }

    private function getUri(){

        if(!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run(){

        $uri = $this->getUri();
       // echo $uri;

        foreach($this->routes as $uriPattern => $path){
           // echo $uriPattern."<br>";
            if(preg_match("~$uriPattern~", $uri)){

                $internalRoute = preg_replace("~$uriPattern~", $path, substr($uri,13));

                $internalRoute = explode('/',$internalRoute);

                $controllerName = ucfirst(array_shift($internalRoute)).'Controller';

                $actionName = 'action'.ucfirst(array_shift($internalRoute));

                $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';

                if(file_exists($controllerFile)){
                    include_once($controllerFile);
                }

                

                $controllerObject = new $controllerName;
                $result = call_user_func_array(array($controllerObject,$actionName), $internalRoute);

                if($result == true){
                    break;
                }


            }

        }




    }
}