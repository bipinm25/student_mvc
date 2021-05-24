<?php

namespace app\controller;

use app\core\Request;
use app\model\Course;
use app\model\Student;

class CourseController extends Controller{

    public function index(Request $request){
        $re_data =  $request->getData();        
        $course = new Course();
        $course->initPagination(5, '/course', $re_data['page'] ?? 1);
        $data = $course->fetchAll(['id', 'course_name']);   
        $pagination = $course->getPagination();          
        return $this->view('course', compact('data','pagination'));
    }

    public function courseForm(Request $request){
        $data = $request->getData();
        $course = new Course();
        if(isset($data['id']) && (int)$data['id'] > 0 ){
           $course = (new Course())->find('id', (int)$data['id'] );     
        }                 
        return $this->view('add_course', compact('course'));
    }

    public function subscribeCourseForm(){
        $student = (new Student())->fetchAll(['id','first_name','last_name']);
        $course = (new Course())->fetchAll(['id', 'course_name']);
        return $this->view('course_subscribe', compact('student','course'));
    }

    public function saveCourse(Request $request){
        $data = $request->getData();
        
        try {
            $course = new Course();
            if(isset($data['course_id']) && (int)$data['course_id'] > 0){
                $course->id = (int)$data['course_id'];
            }
            $course->course_name = $data['course_name'];
            $course->course_details = $data['description'];
            $course->save();
            $this->redirect('\course');
        } catch (\Exception $e) {
            echo 'Something Went Wrong';
        }
    }

    public function subscribeCourse(Request $request){
        $data = $request->getData();
        $student = [];
        foreach($data['student_id'] as $k => $v){
            $student[$v][] = $data['course_id'][$k];
        }

        $course = new Course();
        $course->customQuery($student);
        $this->redirect('\report');
    }


    public function deleteCourse(Request $request){
        $data = $request->getData();      
        $course = new Course();
        $course->delete("delete from course_subscribe where course_id = ? ", [$data['id']]);
        $res = $course->delete("delete from ".$course->tableName()." where id = ? ", [$data['id']]);
        return json_encode(['success' => $res]);

    }


    
}