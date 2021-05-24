<?php

namespace app\core;


class Router{

    public Request $request;
    public Response $response;

    protected $routers = array();

    public function __construct(Request $request, Response $response){
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback){      
            $this->routers['get'][$path] = $callback;
    }

    public function post($path, $callback){
        $this->routers['post'][$path] = $callback;
    }
    
    public function resolve(){
       $path =  $this->request->getPath();
       $method = $this->request->getMethod();       
       
       $callback = $this->routers[$method][$path] ?? false;

       if($callback === false){
           $this->response->setStatusCode(404);
           return $this->renderView('_404');
       }

       if(is_string($callback)){
           return $this->renderView($callback);
       }

       if(is_array($callback)){
           $callback[0] = new $callback[0]();
       }     

       return call_user_func($callback, $this->request);
    }

    public function renderView($view, $params = []){   
        $layout = $this->setLayout($view);
        $body = $this->renderHtml($view, $params);
        return str_replace('{{html_content}}', $body, $layout);        
    }

    protected function setLayout($view){
        ob_start();
        include_once Application::$ROOT_PATH."/view/layouts/main.php";
        if(file_exists(Application::$ROOT_PATH."/view/js/$view.js")){
            include_once Application::$ROOT_PATH."/view/js/$view.js";
        }
        return ob_get_clean();
    }

    protected function  renderHtml($view, $params){        
        foreach($params as $key => $val){
            $$key = $val;
        }
        ob_start();
        include_once Application::$ROOT_PATH."/view/$view.php";
        return ob_get_clean();
    }
    
}