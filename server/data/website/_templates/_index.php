<?php
$username = Session::get('session_username');
$userobj = new User($username);
?>
<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5"><?=$userobj->getUsername();?></h1>
    </div>
</main>
