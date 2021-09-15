<?php

    require_once("config.php");

    $login = "1";
    $password = "2";
    $sql = new Database();
    
    $sql -> execute("INSERT INTO users (userlogin, userpassword) values(:L, :P)");

    $usuarios = $sql -> select("SELECT * FROM users");
    echo json_encode($usuarios);

?>