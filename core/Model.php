<?php

namespace app\core;

abstract class Model{

    abstract public function tableName() : string;

    abstract public function tableColumns() : array;

    public function save(){
        $table = $this->tableName();
        $tbColumns = $this->tableColumns();
        $bindcol = array_map(function($col){
            return ":$col";
        }, $tbColumns);

        try{
            $statement = $this->prepareQuery("insert into $table (".implode(',', $tbColumns ).") values (".implode(',', $bindcol).")");
            foreach($tbColumns as $column){
                $statement->bindParam(":$column", $this->{$column});
            }

            $statement->execute();
            return $this->getLastinsertId();

        }catch(\PDOException $e){
            echo 'Something went wrong '.$e->getMessage();
            exit;
        }               
    }

    protected function prepareQuery($sql){
        return Application::$app->db->pdo->prepare($sql);
    }

    public function getLastinsertId(){
        return Application::$app->db->pdo->lastInsertId();
    }

    public function fetchAll($columns = []){
        $table = $this->tableName();
        if(count($columns) === 0){
            $col = '*';
        }else{
            $col = implode(',', $columns);
        }
        $statement = $this->prepareQuery("select $col from $table");
        $statement->execute();
        return $statement->fetchAll();
    }
}