<?php

namespace app\controller;

use app\core\Request;

class CourseController extends Controller{

    public function courseForm(){
        return $this->view('add_course');
    }

    public function subscribeCourseForm(){
        return $this->view('course_subscribe');
    }

    public function saveCourse(Request $request){
        var_dump($request->getData());
    }

    public function subscribeCourse(Request $request){
        var_dump($request->getData());
    }


    
}