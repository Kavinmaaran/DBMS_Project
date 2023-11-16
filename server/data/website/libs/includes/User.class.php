<?php
class User
{
    private $conn;
    public function __construct($username)
    {
        $this->username = $username;
    }

    public static function signup($user,$pass, $privilege)
    {
        $options = ['cost' => 9, ];
        $pass = password_hash($pass, PASSWORD_BCRYPT, $options);
        $conn=Database::getConnection();
        $sql ="INSERT INTO `User_data` (`username`, `password`, `branch`, `privilage`, `balance`)
               VALUES ('$user', '$pass', 'branch1', '$privilege','500');";
        $error=false;
        if ($conn->query($sql) === true) {
            $error=false;
        } else {
            $error=$conn->connect_error;
        }

        //$conn->close();
        return $error;
    }

    public static function login($user, $pass)
    {
        $query = "SELECT * FROM `User_data` WHERE `username` = '$user'";
        $conn = Database::getConnection();
        $result = $conn->query($query);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if (password_verify($pass, $row['password'])) {
                return $row['username'];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function __call($name, $arguments)
    {
        $property = preg_replace("/[^0-9a-zA-Z]/", "", substr($name, 3));
        $property = strtolower(preg_replace('/\B([A-Z])/', '_$1', $property));
        if (substr($name, 0, 3) == 'get') {
            return $this->_get_data($property);
        } elseif (substr($name, 0, 3) == 'set') {
            return $this->_set_data($property, $arguments[0]);
        } else {
            throw new Exception("User::__call() -> $name, function unavailable.");
        }
    }

    public function _get_data($var)
    {
        if (!$this->conn) {
            $this->conn=Database::getConnection();
        }
        $query = "SELECT `$var` FROM `User_data` WHERE `username` = '$this->username' LIMIT 1;";
        $result = $this->conn->query($query);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            return $row["$var"];
        } else {
            return null;
        }
    }

    public function _set_data($var, $data)
    {
        if (!$this->conn) {
            $this->conn=Database::getConnection();
        }
        $query = "UPDATE `User_data` SET `$var` = '$data' WHERE `username` = $this->username;";
        $result = $this->conn->query($query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function getUsername()
    {
        return $this->username;
    }
}
