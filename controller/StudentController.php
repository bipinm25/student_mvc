<?php

namespace app\controller;


use app\core\Request;
use app\model\Student;

class StudentController extends Controller{

    public function index(){        
        $data = (new Student())->fetchAll(['id', 'first_name', 'last_name']);        
        return $this->view('student_list', compact('data'));
    }

    public function registerForm(){
        return $this->view('registration');
    }

    public function registerStudent(Request $request){

       $data = $request->getData();

       $student = new Student();
       $student->first_name = $data['first_name'];
       $student->last_name = $data['last_name'];
       $student->dob = date('Y-m-d', strtotime($data['dob']));
       $student->contact_no = $data['contact_no'];
       $student->save();       

       return $this->index();
       
    }

}
