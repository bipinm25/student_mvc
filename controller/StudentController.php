<?php

namespace app\controller;


use app\core\Request;
use app\model\Student;

class StudentController extends Controller{

    public function index(Request $request){
        $re_data =  $request->getData();        
        $student = new Student();
        $student->initPagination(5, '/', $re_data['page'] ?? 1);
        $data = $student->fetchAll(['id', 'first_name', 'last_name']);        
        $pagination = $student->getPagination();
        return $this->view('student_list', compact('data', 'pagination'));
    }

    public function registerForm(Request $request){
        $data = $request->getData();
        $student = new Student();
        if(isset($data['id']) && (int)$data['id'] > 0 ){
           $student = (new Student())->find('id', (int)$data['id'] );        
        }             
        return $this->view('registration', compact('student'));
    }

    public function registerStudent(Request $request){    
       $student = new Student();        

       $data = $request->getData();       
       try {
            $student = new Student();
            if(isset($data['student_id']) && (int)$data['student_id'] > 0){
                $student->id = (int)$data['student_id'];
            }
            $student->first_name = $data['first_name'];
            $student->last_name = $data['last_name'];
            $student->dob = date('Y-m-d', strtotime($data['dob']));
            $student->contact_no = $data['contact_no'];
            $student->save();        
            $this->redirect('/');

       } catch (\Exception $e) {
           echo 'SomethingWent Wrong';           
       }       
    }

    public function deleteStudent(Request $request) {
        $data = $request->getData();      
        $student = new Student();
        $student->delete("delete from course_subscribe where student_id = ?", [$data['id']]);        
        $res = $student->delete("delete from ".$student->tableName()." where id = ? ", [$data['id']]);
        return json_encode(['success' => $res]);
    }

}
