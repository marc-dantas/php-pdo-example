<?php

    require_once("config.php");

    $root = new User();
    $root -> loadById(2);
    echo $root;

?>