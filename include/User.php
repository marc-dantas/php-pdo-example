<?php

    class User {
        private $userId;
        private $login;
        private $password;
        private $registrationDate;

        public function getUserId()
        {
            return $this -> userId;
        }

        public function getLogin()
        {
            return $this -> login;
        }

        public function getPassword()
        {
            return $this -> password;
        }

        public function getRegistrationDate()
        {
            return $this -> registrationDate;
        }

        public function setUserId($value)
        {
            $this -> userId = $value;
        }

        public function setLogin($value)
        {
            $this -> login = $value;
        }

        public function setPassword($value)
        {
            $this -> password = $value;
        }

        public function setRegistrationDate($value)
        {
            $this -> registrationDate = $value;
        }

        public function loadById($id)
        {
            $db = new Database();
            $results = $db -> select("SELECT * FROM users WHERE userid = :ID", array(
                ":ID" => $id
            ));

            if (count($results) > 0) {
                $row = $results[0];
                $this -> setUserId($row['userid']);
                $this -> setLogin($row['userlogin']);
                $this -> setPassword($row['userpassword']);
                $this -> setRegistrationDate($row['userdate']);
            }
        }
    }

?>