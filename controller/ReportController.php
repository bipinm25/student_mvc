<?php
namespace app\controller;

class ReportController extends Controller{

    public function index(){
        return $this->view('report');
    }
}