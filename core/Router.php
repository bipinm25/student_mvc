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

    public function get($path,$callback){
            $this->routers['get'][$path] = $callback;
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
       return call_user_func($callback);
    }

    public function renderView($view){       
        $layout = $this->setLayout();
        $body = $this->renderHtml($view);      

       return str_replace('{{html_content}}', $body, $layout);        
    }

    protected function setLayout(){
        ob_start();
        include_once Application::$ROOT_PATH."/view/layouts/main.php";
        return ob_get_clean();
    }

    protected function  renderHtml($view){
        ob_start();
        include_once Application::$ROOT_PATH."/view/$view.php";
        return ob_get_clean();
    }
    
}