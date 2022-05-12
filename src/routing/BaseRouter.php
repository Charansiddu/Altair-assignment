<?php
include_once 'models/BaseModel.php';

class BaseRouter{

    private $routes;

    public function add($method, $uri, $controller, $function){
        $this->routes[] = [
            'method'        => $method,
            'uri'           => $uri,
            'controller'    => $controller,
            'function'      => $function
        ];
    }

    public function getRoute($uri, $method){
        $routes = $this->getRoutes();

        foreach($routes as $route){
            if($route['uri']==$uri && $route['method']==$method){
                return $route;
            }
        }
    }

    public function getRoutes(){
        return $this->routes;
    }
}
?>