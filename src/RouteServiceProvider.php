<?php
require_once 'routing/BaseRouter.php';

class RouteServiceProvider{

    function __construct()
    {
        $request = $this->handleIndex($_REQUEST);

        $this->loadRouteHandler($request);
    }

    public function loadRouteHandler($request){
        $url = $this->parseUrl($request['url']);
        $router = ucFirst($url[0]).'Router.php';
        $routerClass = ucFirst($url[0]).'Router';

        if(file_exists('routing/'.$router)){
            require 'routing/'.$router;
            $entityRouter = new $routerClass();

            $requestMethod = $this->setRequestMethod($request);
            
            $this->route($entityRouter, $url, $requestMethod);
        }
        else{
            throw new Exception('The file does not exist');
        }
    }

    public function route(BaseRouter $entityRouter, Array $url, $method){

        $route = $entityRouter->getRoute($this->handleParameters($url), $method);
        $function = $route['function'];

        $model = $this->loadModel($url);
        $controller = $this->loadController($route);

        $controller->{$function}($model, $_REQUEST);
    }

    public function loadController(Array $route){
        $controllerFile = $route['controller'].'.php';
        $controllerClass = $route['controller'];
        
        if(file_exists('controllers/'.$controllerFile)){
            require 'controllers/'.$controllerFile;

            return new $controllerClass;
            
        }
        else{
            throw new Exception('The file does not exist');
        }
    }

    public function loadModel(Array $url){
        $id = $url[1];
        
        $model = null;
        $modelName = ucFirst($url[0]);
        $modelFile = $modelName.'Model.php';
        $modelClass = $modelName.'Model';

        if($modelName == 'Index') return $model;

        if(file_exists('models/'.$modelFile)){
            require 'models/'.$modelFile;

            $model = new $modelClass;
            if(isSet($id)){
                $model->find($id);
            }
        }
        else{
            throw new Exception('The file does not exist');
        }

        return $model;
    }

    private function handleParameters(Array $url){
        for($i=0; $i<count($url); $i++){
            if(is_numeric($url[$i])){
                $url[$i] = "{id}";
            }
        }

        return implode("/",$url);
    }

    private function parseUrl($url){
        $url = rtrim($url,'/');
        $url = explode('/', $url);

        return $url;
    }

    private function handleIndex($request){
        if(!isSet($request['url'])){
            $request['url'] = 'index';
        }

        return $request;
    }

    private function setRequestMethod(Array $request){
        if(isSet($request['_method'])){
            $requestMethod = $request['_method'];
        }
        else{
            $requestMethod = $_SERVER['REQUEST_METHOD'];
        }

        return $requestMethod;
    }
}
