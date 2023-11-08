<?php
$username = Session::get('session_username');
$userobj = new User($username);
$branch = $userobj->getBranch();
if($userobj->getPrivilage()==2){
    $conn = Database::getMongoConnection();
    if(!Session::isset('quiz')){
        // print_r($_POST);
        ?>
        <div class="quiz_name">
            <h2>Enter Quiz Size</h2>
            <form method="post">
                <label for="quiz_name">Quiz Size:</label>
                <input type="text" name="quiz_size" required><br>
                
                <input type="submit" name="create_quiz" value="Create Quiz">
            </form>
        </div>
        <? 
        Session::set('quiz', 1);
    }else{
        for($i = 0; $i < Session::get('quiz_size'); $i++){
            if (isset($_POST['question_'.$i+1]) and isset($_POST['option_a_'.$i+1]) and isset($_POST['option_b_'.$i+1]) and isset($_POST['option_c_'.$i+1]) and isset($_POST['option_d_'.$i+1]) and isset($_POST['answer_'.$i+1]) ) {
                echo "hi";
                $question=$_POST["question_".$i+1];
                $option_a=$_POST["option_a_".$i+1];
                $option_b=$_POST["option_b_".$i+1];
                $option_c=$_POST["option_c_".$i+1];
                $option_d=$_POST["option_d_".$i+1];
                $answer=$_POST["answer_".$i+1];
                $userName = $userobj->getUsername();
                $quizName = $_POST["quiz_name"];
                $collection = $conn->test->$quizName;
                $insertOneResult = $collection->insertOne([
                    'question' => $question,
                    'option_a' => $option_a,
                    'option_b' => $option_b,
                    'option_c' => $option_c,
                    'option_d' => $option_d,
                    'answer' => $answer,
                ]);                
            }
        }
        Session::delete('quiz');
        if(isset($_POST["quiz_size"])){
            Session::set('quiz_size', $_POST["quiz_size"]);
        }

        ?>
        <h2>Enter Quiz Name</h2>
            <form method="post">
            <label for="quiz_name">Quiz Name:</label>
            <input type="text" name="quiz_name" required><br>
        <?
        for($i = 0; $i < Session::get('quiz_size'); $i++){
        ?>
                <div>
                    <h2>Question <?=$i+1?></h2>
                    <form method="post">
                        <label for="question_<?=$i+1?>">Question:</label>
                        <textarea name="question_<?=$i+1?>" rows="4" cols="50" required></textarea><br>

                        <label for="option_a_<?=$i+1?>">Answer A:</label>
                        <input type="text" name="option_a_<?=$i+1?>" required><br>

                        <label for="option_b_<?=$i+1?>">Answer B:</label>
                        <input type="text" name="option_b_<?=$i+1?>" required><br>

                        <label for="option_c_<?=$i+1?>">Answer C:</label>
                        <input type="text" name="option_c_<?=$i+1?>" required><br>

                        <label for="option_d_<?=$i+1?>">Answer D:</label>
                        <input type="text" name="option_d_<?=$i+1?>" required><br>

                        <label for="answer_<?=$i+1?>">Correct Answer:</label>
                        <input type="text" name="answer_<?=$i+1?>" required><br>

                    
                </div><?}?>
                <input type="submit" value="Submit">
                </form><?
}
}else if ($userobj->getPrivilage()==1){
    $conn = Database::getMongoConnection();
    // $collections = $conn->test->getCollections();
    // print_r($collections);
    foreach( $conn->test->listCollections() as $c){?>
    <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?=$c['name']?></h5>
    <a href="<?=get_config("base_name")?>quizlist?quizname=<?=$c['name'];?>" class="btn btn-primary">Go somewhere</a>
  </div>
</div><?
}
}

?>

