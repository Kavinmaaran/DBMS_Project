<?php

class UserSession
{
    public function __construct($token)
    {
        $this->conn = Database::getConnection();
        $this->token = $token;
        $this->data = null;
        $query = "SELECT * FROM `User_session` WHERE `token`= '$token' LIMIT 1";
        $result = $this->conn->query($query);
        if ($result->num_rows) {
            $row = $result->fetch_assoc();
            $this->data = $row;
            $this->username = $row['username'];
            return true;
        } else {
            // throw new Exception("Session construction Failure.");
            return false;
        }
    }
    public static function authenticate($user, $pass)
    {
        $username = User::login($user, $pass);
        $user = new User($username);
        
        if ($username) {
            $conn = Database::getConnection();
            $ip = $_SERVER['REMOTE_ADDR'];
            $agent = $_SERVER['HTTP_USER_AGENT'];
            $token = md5(rand(0, 9999999).$ip.$agent.time());
            $query = "INSERT INTO `User_session` (`username`, `token`, `login_time`, `ip`, `agent`, `active`) 
            VALUES ('$user->username', '$token', now(), '$ip', '$agent', '1');";
            if(Session::get('rememberMe')){
                $tokenCookie = md5(strrev(md5($token)));
                $sql = "INSERT INTO `Remember_user` (`username`, `token`, `hash`)
                VALUES ('$user->username', '$token', '$tokenCookie');";
                if ($conn->query($sql)) {
                    setcookie("Remember_User", "$tokenCookie", time() + 24 * 60 * 60);
                } else {
                    return false;
                }
            }
            if ($conn->query($query)) {
                Session::set('session_token', $token);
                return $token;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function authorize($token)
    {
        if ($sess = new UserSession($token)) {
            if ($token == $sess->data['token']) {
                if ($sess->isValid()) {
                    Session::set('is_loggedin', true);
                    Session::set('session_username', $sess->username);
                    Session::set('session_token', $token);
                    Session::set('rememberMe', TRUE);
                    return true;
                } else {
                    // throw new Exception("Invalid Session");
                    return false;
                }
            } else {
                // throw new Exception("Invalid token");
                return false;
            }
        } else {
            return false;
        }
    }

    public function getUser()
    {
        return new User($this->username);
    }

    /**
     * Check if the validity of the session is within one hour, else it inactive.
     *
     * @return boolean
     */
    public function isValid()
    {
        if ($this->data['active']) {
            $timeDiff = strtotime(date('y-m-d h:i:s')) - strtotime($this->data['login_time']);
            if (!($this->getIP() == $this->data['ip'])) {
                echo($this->data['ip']);
                return false;
            }
            if (!($this->getUserAgent() == $this->data['agent'])) {
                return false;
            }
            if ($timeDiff < 3600) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getIP()
    {
        return $_SERVER['REMOTE_ADDR'];
    }

    public function getUserAgent()
    {
        return $_SERVER['HTTP_USER_AGENT'];
    }

    public function deactivate()
    {
        if (!$this->conn) {
            $this->conn=Database::getConnection();
        }
        $query = "UPDATE `User_session` SET `active` = '0' WHERE `token` = '$this->token';";
        $result = $this->conn->query($query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
