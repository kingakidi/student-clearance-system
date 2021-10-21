<?php 
    include "./db.php";

    function clean($var){
        global $conn;
        return trim(strtolower(mysqli_real_escape_string($conn, $var)));
    }
    
    function cleanPassword($var){
        global $conn;
        return mysqli_real_escape_string($conn, $var);
    }

    function error($var){
        return "<span class='text-danger'>  $var </span>";
    }

    function success($var){
        return "<span class='text-success'>  $var </span>";
    }