<?php

require_once __DIR__.'/../vendor/autoload.php';

define("ROOT_FOLDER", $_SERVER['REQUEST_URI']);
define("P_PATH", dirname(__DIR__));

$db = include_once P_PATH.'/db.php';

use app\core\Application;
use app\controller\StudentController;
use app\controller\CourseController;
use app\controller\ReportController;

$app = new Application(P_PATH, $db);

$app->router->get('/', [StudentController::class, 'index']);

$app->router->get('/registration',  [StudentController::class, 'registerForm']);

$app->router->post('/submit_registration', [StudentController::class, 'registerStudent']);

$app->router->post('/delete_student', [StudentController::class, 'deleteStudent']);


$app->router->get('/course', [CourseController::class, 'index']);

$app->router->get('/add_course', [CourseController::class, 'courseForm']);

$app->router->post('/save_course', [CourseController::class, 'saveCourse']);

$app->router->post('/delete_course', [CourseController::class, 'deleteCourse']);



$app->router->get('/subscribe-course', [CourseController::class, 'subscribeCourseForm']);

$app->router->post('/subscribe_course', [CourseController::class, 'subscribeCourse']);


$app->router->get('/report', [ReportController::class, 'index']);

$app->run();
