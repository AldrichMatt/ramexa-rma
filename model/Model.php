<?php

class Model{

    public function __construct(){
        global $db;
        $db = mysqli_connect('localhost','root', '', 'ramexa');
    }

    private function filter($string){
        return htmlspecialchars($string);
    }
    /**
     * Summary of getAll
     * @return array
     */
    public function getAll($table){
        global $db;
        return mysqli_query($db,'SELECT * FROM '.$table.'')->fetch_all();
    }

    public function getAllWhere($table, $condition){
        global $db;
        return mysqli_query($db, 'SELECT * FROM `'.$table.'` WHERE '.$condition.'')->fetch_all();
    }

    public function insertTableColVal($table, $column, $value){
        global $db;
        $table = $this->filter($table);
        $column = $this->filter($column);
        mysqli_query($db, 'INSERT INTO '.$table.' ('.$column.') VALUES ('.$value.');');
    }
    
    public function updateTableSetWhere($table, $set, $where){
        global $db;
        // $table = $($table);
        // $set = $this->filter($set);
        // $where = $this->filter($where);
        mysqli_query($db, "UPDATE ".$table." SET ".$set." WHERE ".$where."");

    }

    public function deleteTableColVal($table, $column, $value){
        global $db;
        $table = $this->filter($table);
        $column = $this->filter($column);
        mysqli_query($db, "DELETE FROM ".$table." WHERE ".$column." = ".$value."");
    }

}

?>