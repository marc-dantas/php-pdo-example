<?php

    class User {
        private $userId;
        private $login;
        private $password;
        private $registrationDate;

        public function __construct($userlogin = "", $userpassword = "")
        {
            $this -> setLogin($userlogin);
            $this -> setPassword($userpassword);
        }

        public static function search($login)
        {
            $db = new Database();
            $user = $db -> select("SELECT * FROM users WHERE userlogin LIKE :LOGIN", array(":LOGIN" => $login));
            return $user;
        }

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
                $this -> setData($row);
            } 
        }

        public static function userList($output)
        {
            $db = new Database();
            $userList = $db -> select("SELECT * FROM users ORDER BY userlogin");
            
            if ($output == 'array') {
                return $userList;
            } else if ($output == 'json') {
                return json_encode($userList);
            } else {
                return NULL;
            }
        }

        public function login($login, $password)
        {
            $db = new Database();
            $results = $db -> select("SELECT * FROM users WHERE userlogin = :LOGIN AND userpassword = :PASSWORD", array(
                ":LOGIN" => $login,
                ":PASSWORD" => $password
            ));

            if (count($results) > 0) {
                $row = $results[0];
                $this -> setData($row);
            } else {
                throw new Exception("Invalid login and/or password.");
            }
        }

        public function setData($data)
        {
            $this -> setUserId($data['userid']);
            $this -> setLogin($data['userlogin']);
            $this -> setPassword($data['userpassword']);
            $this -> setRegistrationDate(new DateTime($data['userdate']));
        }

        public function insert()
        {
            $db = new Database();
            $results = $db -> select("CALL user_insert(:LOGIN, :PASSWORD)", array(
                ":LOGIN" => $this -> getLogin(),
                ":PASSWORD" => $this -> getPassword()
            ));

            if (count($results) > 0) {
                $this -> setData($results[0]);
            }
        }

        public function __toString()
        {
            return json_encode(
                array(
                    "userid" => $this -> getUserId(),
                    "userlogin" => $this -> getLogin(),
                    "userpassword" => $this -> getPassword(),
                    "userdate" => $this -> getRegistrationDate() -> format("d/m/Y")
                )
            );
        }
    }

?>