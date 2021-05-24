<?php
 namespace app\model;

use app\core\Model;

class Report extends Model{    
    public $student_id = 0;
    public $course_id = 0;

    public function tableName(): string {
        return 'course_subscribe';
    }

    public function tableColumns(): array   {
        return ['student_id', 'course_id'];        
    }


}