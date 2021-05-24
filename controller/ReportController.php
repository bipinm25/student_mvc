<?php
namespace app\controller;

use app\core\Request;
use app\model\Course;
use app\model\Report;

class ReportController extends Controller{

    public function index(Request $request){
        $re_data =  $request->getData();     
        $report = new Report();          
        $report->initPagination(5, '/report', $re_data['page'] ?? 1);    
        $sql = "SELECT CONCAT(s.first_name,' ', s.last_name) full_name,c.course_name 
                FROM course_subscribe cs 
                LEFT JOIN students s ON cs.student_id=s.id
                LEFT JOIN courses c ON cs.course_id=c.id 
                ORDER BY s.first_name";        
        
        $report_date = $report->dbQuery($sql);
        $pagination = $report->getPagination();  
       

        return $this->view('report', compact('report_date', 'pagination'));
    }
    
}