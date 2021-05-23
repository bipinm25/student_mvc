<?php

namespace app\controller;

use app\core\Application;

class Controller{

    public function view($view, $params = []){
        return Application::$app->router->renderView($view, $params);
    }
}