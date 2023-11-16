<?php
$rememberMe=null;
if (isset($_POST['username']) and isset($_POST['password']) ) {
    $username=$_POST["username"];
    $password=$_POST["password"];
    unset($_COOKIE['Remember_User']);
    if (isset($_POST['rememberMe'])){
        $rememberMe=$_POST["rememberMe"];
    }else{
        $rememberMe="notRemember";
    }
}
if ($rememberMe=="remember") {
    Session::set('rememberMe', TRUE);
    $token = UserSession::authenticate($username, $password);
    $userobj = new User($username);
    Session::set('is_loggedin', true);
    Session::set('session_username', $userobj->username);
    Session::set('session_token', $token);
    header("Location: http://".get_config("base_path")."index", true, 301);
    exit();
}else if ($rememberMe=="notRemember") {
    Session::set('rememberMe', FALSE);
    $token = UserSession::authenticate($username, $password);
    $userobj = new User($username);
    Session::set('is_loggedin', true);
    Session::set('session_username', $userobj->username);
    Session::set('session_token', $token);
    header("Location: http://".get_config("base_path")."index", true, 301);
    exit();
} else {?>
<!-- <main class="form-signin">
    <form action="login" method="post">
    <h1 class="h1 m-5 fw-normal"><strong>Omega</strong></h1>
        <h2 class="h2 mb-3 fw-normal">Please sign in</h2>
        <div class="form-floating">
            <input name="username" type="text" class="form-control" id="floatingInput" placeholder="Username">
            <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating">
            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember" name="rememberMe"> Remember me
            </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary hvr-buzz-out" type="submit">Sign in</button>
    </form>
</main> -->
<section class="container">
    <div class="login-container">
        <div class="circle circle-one"></div>
        <div class="form-container">
            <img src="https://raw.githubusercontent.com/hicodersofficial/glassmorphism-login-form/master/assets/illustration.png" alt="illustration" class="illustration" />
            <h1 class="opacity">LOGIN</h1>
            <form method="post">
                <input type="text" name="username" placeholder="USERNAME" />
                <input type="password" name="password" placeholder="PASSWORD" />
                <button class="opacity">SUBMIT</button>
            </form>
            <div class="register-forget opacity">
                <a href="http://omegaquiz.local/signup">REGISTER</a>
            </div>
        </div>
        <div class="circle circle-two"></div>
    </div>
    <div class="theme-btn-container"></div>
</section>

<?}
    ?>