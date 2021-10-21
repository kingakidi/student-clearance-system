<?php
    $conn = mysqli_connect("localhost", "root", "", "clearance");

    if (!$conn) {
       die(" UNABLE TO ESTABLISH CONNECTION ");
    }
    ob_start();
    session_start();
    