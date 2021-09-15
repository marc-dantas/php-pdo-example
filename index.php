<?php

    require_once("config.php");

    $u = new User();
    $u -> insert();
    echo $u;

?>