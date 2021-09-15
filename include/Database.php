<?php

class Database extends PDO {
    private $connection;

    public function __construct() 
    {
        $this -> connection = new PDO("mysql:host=localhost;dbname=dbphp7", "root", "root");
    }

    private function setParams($statement, $parameters = array()) 
    {
        foreach ($parameters as $key => $value) {
            $this -> setParam($statement, $key, $value);
        }
    }

    private function setParam($statement, $key, $value)
    {
        $statement -> bindParam($key, $value);
    }

    public function query($rawQuery, $params = array()) 
    {
        $statement = $this -> connection -> prepare($rawQuery);
        $this -> setParams($statement, $params);
        $statement -> execute();
        return $statement;
    }

    public function select($rawQuery, $params = array()):array
    {
        $stmt = $this -> query($rawQuery, $params);
        return $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }
}

?>