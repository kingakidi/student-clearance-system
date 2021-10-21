<?php
    session_start();
    session_unset();
    session_destroy();
    $_SESSION['usertype'] = NULL;
    header("Location: ./login.php");