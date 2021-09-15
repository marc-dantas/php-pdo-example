<?php

    require_once("config.php");

    $u = new User();
    echo $u;
    $u -> loadById(1);
    $u -> update();
    echo $u;
?>