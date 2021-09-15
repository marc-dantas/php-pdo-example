<?php

    require_once("config.php");

    $sql = new Database('mysql', 'localhost', 'dados', 'root', '');
    $sql -> execute("");
    $usuarios = $sql -> select("SELECT * FROM tb_usuarios");
    echo json_encode($usuarios);

?>