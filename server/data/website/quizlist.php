<?php
include "libs/load.php";
if (isset($_GET['logout'])) {
    if (Session::destroy()) {
        header("Location: http://".get_config("base_path")."login", true, 301);
        exit();
    } else {
        return "Logout Failed";
    }
}

if (isset($_COOKIE["Remember_User"])) {
    $hash = $_COOKIE["Remember_User"];
    $conn = Database::getConnection();
    $sql = "SELECT * FROM `Remember_user` WHERE `hash` = '$hash' LIMIT 1;";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $token = $row['token'];
    } else {
        header("Location: http://".get_config("base_path")."login", true, 301);
        exit();
    }
}else if (Session::get('session_token')) {
    $token = Session::get('session_token');
}else {
    header("Location: http://".get_config("base_path")."login", true, 301);
    exit();
}

if (UserSession::authorize($token)) {?>
    <!doctype html>
    <html lang="en">
    
    
    <?load_template('_head');?>
    
    <body>
        <?load_template('_header');?>
    
        <main>
        <?load_template('_quiz');?>
        </main>
    
        <?load_template('_footer');?>
    
    
        <script
            src="<?=get_config("base_name")?>assets/dist/js/bootstrap.bundle.min.js">
        </script>
    
    
    </body>
    
    </html><?
} else {
    header("Location: http://".get_config("base_path")."login", true, 301);
    exit();
}
