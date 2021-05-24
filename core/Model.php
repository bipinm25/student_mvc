<?php

namespace app\core;

abstract class Model{

    protected $where = array();

    protected $pagination = '';
    
    protected $limit = 100;
    protected $url = '/';
    protected $page = 1;
    protected $offset = 0;

    abstract public function tableName() : string;

    abstract public function tableColumns() : array;

    public function find($column, $value){
        $table = $this->tableName();
        try{
            $statement = $this->prepareQuery( "select * from $table where $column=:$column");
            $statement->bindParam(":$column", $value);
            $statement->execute();
            if($statement->rowCount() === 1){
                return $statement->fetch(\PDO::FETCH_OBJ);
            }else{
                return $statement->fetchAll();
            }
        }catch(\PDOException $e){
            echo 'Something went wrong';  
        }        
    }

    protected function getLimit($sql, $where = []){
        try{
            $statement = $this->prepareQuery($sql);
            if(count($where) > 0){
                $statement->execute($where);
            }else{
                $statement->execute();
            }
            $this->setPagination($statement->rowCount());
            $limit = " limit $this->offset, $this->limit";
            return $limit;
        }catch(\PDOException $e){
            echo 'Something went wrong in the query';             
        }
    }

    public function dbQuery($sql, $where = []){
        try{
            $limit = $this->getLimit($sql, $where);
            $statement = $this->prepareQuery($sql.$limit);
            if(count($where) > 0){
                $statement->execute($where);
            }else{
                $statement->execute();
            }
            if($statement->rowCount() === 1){
                return $statement->fetch(\PDO::FETCH_OBJ);
            }else{
                return $statement->fetchAll();
            }
        }catch(\PDOException $e){
            echo 'Something went wrong in the query';             
        }
    }

    public function dbQueryInert($table){

    }

    public function save(){
        $table = $this->tableName();
        $tbColumns = $this->tableColumns();
        $bindcol = array_map(function($col){
            return ":$col";
        }, $tbColumns);

        if($this->id > 0){
            $update = "";
            foreach($tbColumns as $col){
                $update .= "`$col` = :$col, ";
            }
            $sql = "update $table set ".rtrim($update, ", ")." where id = :id";
        }else{
            $sql = "insert into $table (".implode(',', $tbColumns ).") values (".implode(',', $bindcol).")";
        }

        try{
            $statement = $this->prepareQuery($sql);
            foreach($tbColumns as $column){              
                $statement->bindParam(":$column", $this->{$column});
            }       

            if($this->id > 0){
                $statement->bindParam(":id", $this->id);
            }

            $statement->execute();
            return $this->getLastinsertId();

        }catch(\PDOException $e){
            echo 'Something went wrong';        
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
        $this->setPagination($statement->rowCount());
        $limit = " limit $this->offset, $this->limit";
        $statement = $this->prepareQuery("select $col from $table $limit");
        $statement->execute();

        return $statement->fetchAll();
    }
      

    public function delete($sql, $where = []){
        try{
            $statement = $this->prepareQuery($sql);
            if(count($where) > 0){
                $statement->execute($where);
            }else{
                $statement->execute();
            }            
            return true;
        }catch(\PDOException $e){
            echo 'Something went wrong in the query';             
        }
    }


    public function getRowCount(){
        
    }

    public function setPagination($total_records){
        $this->pagination = Application::$app->pagination->getPagination($total_records, $this->limit, $this->url, $this->page);
    }

    public function getPagination() {
       return $this->pagination;
    }

    public function initPagination($limit = 0, $url, $page = 1){
        $this->limit = (int)$limit;
        $this->url = $url;
        $this->page = ((int)$page == 0) ? 1 : (int)$page;
        $this->offset = ($this->page - 1) * $this->limit;
    }
    
}