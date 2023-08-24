<?php

class Model{

    public function __construct(){
        global $db;
        $db = mysqli_connect('localhost','root', '', 'ramexa');
    }

    private function filter($string){
        return filter_var($string, FILTER_SANITIZE_STRING);
    }
    /**
     * Summary of getAll
     * @return array
     */
    public function getAll($table){
        global $db;
        return mysqli_query($db,'SELECT * FROM '.$table.'')->fetch_all();
    }

    public function insertTableColVal($table, $column, $value){
        global $db;
        $table = $this->filter($table);
        $column = $this->filter($column);
        mysqli_query($db, 'INSERT INTO '.$table.' ('.$column.') VALUES ('.$value.');');
    }

    public function deleteTableColVal($table, $column, $value){
        global $db;
        $table = $this->filter($table);
        $column = $this->filter($column);
        mysqli_query($db, "DELETE FROM ".$table." WHERE ".$column." = ".$value."");
    }

}

?>