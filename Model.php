<?php


class Model {
    public function __construct(){

        $koneksi = mysqli_connect("localhost", "root", "", "ramexa");
        if (mysqli_connect_errno()){
            echo mysqli_connect_error();
        }
    }
}
?>