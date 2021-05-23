<?php

namespace app\core;

class Application{

    public Router $router;
    public Request $request;
    public static $ROOT_PATH;
    public Response $response;

    public static Application $app;

    public function __construct($root) {

        self::$ROOT_PATH = $root;
        self::$app = $this;

        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);       
        
    }

    public function run(){
       echo $this->router->resolve();
    }


}