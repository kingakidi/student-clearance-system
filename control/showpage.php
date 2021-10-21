<?php

    if (isset($_POST['loadPage'])) {
        $page = $_POST['loadPage'];
      $page = $page.".php";

        include "../view/$page";
    }
?>