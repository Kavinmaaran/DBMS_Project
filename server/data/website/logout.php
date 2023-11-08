<?php
include 'libs/load.php';
if (Session::destroy()) {
    if (isset($_COOKIE['Remember_User'])) {
        setcookie('Remember_User');
    }
    header("Location: http://".get_config("base_path")."login", true, 301);
    exit();
} else {
    return "Logout Failed";
}