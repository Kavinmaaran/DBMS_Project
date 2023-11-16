<?php

include "libs/load.php";

?>

<!doctype html>
<html lang="en">


<?load_template('_head');?>

<body>

    <main>

        <?load_template('_signup');?>

    </main>

    <?load_template('_footer');?>


    <script src="<?=get_config("base_name")?>assets/dist/js/bootstrap.bundle.min.js">
src="<?=get_config("base_name")?>js/signup.js"></script>

    

</body>

</html>