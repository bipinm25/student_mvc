<?php

namespace app\core;

class Request{

    public function getPath(){
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $pos = strpos($path, '?');
        if($pos === false){
            return $path;
        }      
        $this->parseUrl($path);
        return substr($path, 0, $pos);
    }

    private function parseUrl($queryString = ''){
        $parse = parse_url($queryString);   
        foreach (explode('&', $parse['query']) as $couple) {
            list ($key, $val) = explode('=', $couple);
            $_GET[$key] = $val;        
        }      
    }

    public function getMethod(){
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function getData(){

        $data = [];

        if($this->getMethod() === 'get'){
            foreach($_GET as $key => $val){
                if(!is_array($val)){
                    $data[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                }else{
                    $data[$key] = $val;
                }
            }
        }

        if($this->getMethod() === 'post'){            
            foreach($_POST as $key => $val){
                if(!is_array($val)){
                    $data[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                }else{
                    $data[$key] = $val;
                }                
            }
        }
        return $data;
    }

}