<?php

    require_once("config.php");

    $u = new User();
    $u -> login("root", "admin");
    echo $u;

?>