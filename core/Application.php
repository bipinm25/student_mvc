<?php

namespace app\core;

class Application{

    public static $ROOT_PATH;
    public static Application $app;

    public Router $router;
    public Request $request;    
    public Response $response;
    public Database $db;
    public Pagination $pagination;

    public function __construct($root, $dbParams = []) {

        self::$ROOT_PATH = $root;
        self::$app = $this;

        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);      
        $this->db = new Database($dbParams);
        $this->pagination = new Pagination();        
    }

    public function run(){
       echo $this->router->resolve();
    }


}