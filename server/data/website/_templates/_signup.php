<?php

$signup=false;

if ( isset($_POST['passwd']) and isset($_POST['username']) and isset($_POST['role'])) {
    $passwd=$_POST['passwd'];
    $username=$_POST['username'];
    $role=$_POST['role'];
    $signup=true;
    $error=User::signup($username, $passwd, $role);
}
if ($signup) {
    if (!$error) {?>
<main class="container">
    <div class="bg-light p-5 rounded">
        <h1>SIGNUP SUCCESS</h1>
        <a class="btn btn-lg btn-primary" href="<?=get_config("base_name")?>login" role="button">Click here to LOGIN »</a>
    </div>
</main>
<?php
    } else {?>
<main class="container1">
    <div class="bg-light p-5 rounded mt-3">
        <h1>Signup Fail</h1>
        <p class="lead">Something went wrong, <?=$error?>
        </p>
    </div>
</main>
<?php
}
} else {
    ?>
<!-- <main class="form-signup">
    <form action="signup" method="post"> -->
         <!-- <img class="mb-4"
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRHLCfQ8vAi5g-bib1x8iANL5heysMc-OEIZ_yWiZDucZfOfhUgyE0lZU32XVuGWfDMejk&amp;usqp=CAU"
            alt="" width="" height="100" style="
    display: block;
    margin: auto;
"> -->
        <!-- <h1 class="h3 mb-3 fw-normal">Please Sign up</h1>
        
        <div class="form-floating">
            <input name="username" type="text" class="form-control" id="floatingPasswordusername"
                placeholder="Password">
            <label for="floatingPasswordusername">Username</label>
        </div>
        <div class="form-floating">
            <input name="passwd" type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <div class="form-check">
  <input class="form-check-input" type="radio" name="role" id="flexRadioDefault1" value="2">
  <label class="form-check-label" for="flexRadioDefault1">
  Professor
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="role" id="flexRadioDefault1" value="1">
  <label class="form-check-label" for="flexRadioDefault1">
Student
  </label>
</div>

    
        <button class="w-100 btn btn-lg btn-primary hvr-buzz-out" type="submit">Sign up</button>
    </form>
</main> -->

<body>
    <section class="container">
        <div class="login-container">
            <div class="circle circle-one"></div>
            <div class="form-container">
                <img src="https://raw.githubusercontent.com/hicodersofficial/glassmorphism-login-form/master/assets/illustration.png" alt="illustration" class="illustration" />
                <h1 class="opacity">SIGNUP</h1>
                <form>
                    <input type="text" placeholder="USERNAME" />
                    <input type="password" placeholder="PASSWORD" />
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="role" id="flexRadioDefault1" value="2">
                    <label class="form-check-label" for="flexRadioDefault1">
                    Professor
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="role" id="flexRadioDefault1" value="1">
                    <label class="form-check-label" for="flexRadioDefault1">
                    Student
                    </label>
                    </div>
                    <button class="opacity">SUBMIT</button>

                </form>
                <div class="register-forget opacity">
                    <a href="http://omegaquiz.local/login">LOGIN</a>
                </div>
            </div>
            <div class="circle circle-two"></div>
        </div>
        <div class="theme-btn-container"></div>
    </section>
</body>




<!-- <section class="container">
        <div class="login-container">
            <div class="circle circle-one"></div>
            <div class="form-container">
                <img src="https://raw.githubusercontent.com/hicodersofficial/glassmorphism-login-form/master/assets/illustration.png" alt="illustration" class="illustration" />
                <h1 class="opacity">SIGNUP</h1>
                <form>
                    <input type="text" placeholder="USERNAME" />
                    <input type="password" placeholder="PASSWORD" />
                    <div class="form-checkg">
  <input class="form-check-input" type="radio" name="role" id="flexRadioDefault1" value="2">
  <label class="form-check-label" for="flexRadioDefault1">
  Professor
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="role" id="flexRadioDefault1" value="1">
  <label class="form-check-label" for="flexRadioDefault1">
Student
  </label>
</div>
                    <button class="opacity">SUBMIT</button>
                </form>
                <div class="register-forget opacity">
                    <a href="">LOGIN</a>
                </div>
            </div>
            <div class="circle circle-two"></div>
        </div>
        <div class="theme-btn-container"></div>
    </section> -->




<?php
}