<?php

require_once __DIR__.'/../vendor/autoload.php';

define("ROOT_FOLDER", $_SERVER['REQUEST_URI']);


use app\core\Application;

$app = new Application(dirname(__DIR__));


$app->router->get('/', 'student_list');

$app->router->get('/registration', function(){
    echo 'registration';
});

$app->router->get('/course', 'course');


$app->router->get('/add-course', function(){
    echo 'add-course';
});

$app->router->get('/subscribe-course', function(){
    echo 'subscribe-course';
});

$app->router->get('/report', function(){
    echo 'report';
});


$app->run();
