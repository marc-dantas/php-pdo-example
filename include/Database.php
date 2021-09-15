<?php

class Database extends PDO {
    private $connection;

    public function __construct()
    {
        $this -> connection = new PDO("mysql:host=localhost;dbname=primary", 'root', '');
    }

    private function setParams($statement, $parameters = array())
    {
        foreach ($parameters as $key => $value) {
            $statement -> bindParam($key, $value);
        }
    }

    public function execute($command, $params = array())
    {
        $statement = $this -> connection -> prepare($command);
        $this -> setParams($statement, $params);
        $statement -> execute();
        return $statement;
    }

    public function select($command, $params = array()):array
    {
        $statement = $this -> execute($command, $params);
        return $statement -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function __toString() { echo "class: Database."; }
}

?>