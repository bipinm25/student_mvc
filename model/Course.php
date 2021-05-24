<?php

namespace app\model;

use app\core\Model;

class Course extends Model{

    public $id = 0;
    public $course_name = '';
    public $course_details = '';

    public function tableName(): string {
        return 'courses';
    }

    public function tableColumns(): array   {
        return ['course_name', 'course_details'];        
    }

    public function customQuery($data){
        try{
            $sql = "insert into course_subscribe(student_id, course_id) values(:student_id, :course_id)";
            $statement = $this->prepareQuery($sql);
                foreach($data as $student_id => $course){
                    foreach($course as $c_id){
                        $statement->bindParam(':student_id', $student_id);
                        $statement->bindParam(':course_id', $c_id);
                        $statement->execute();
                    }
                }
        }catch(\PDOException $e){
            echo 'Something went wrong in the query';             
        }
    }

}