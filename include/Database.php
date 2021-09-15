<?php

class Database extends PDO {
    private $connection;

    public function __construct() 
    {
        $this -> connection = new PDO("mysql:host=localhost;dbname=primary", "root", '');
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

    public function command($command, $params = array()) 
    {
        $statement = $this -> connection -> prepare($command);
        $this -> setParams($statement, $params);
        $statement -> execute();
        return $statement;
    }

    public function select($command, $params = array()):array
    {
        $stmt = $this -> command($command, $params);
        return $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }
}

?>