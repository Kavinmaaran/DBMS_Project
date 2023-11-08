<?php
$username = Session::get('session_username');
$userobj = new User($username);
$branch = $userobj->getBranch();
if($userobj->getPrivilage()==2){
    $conn = Database::getMongoConnection();
    if(!Session::isset('quiz_size')){?>
        <div class="quiz_size">
            <h2>Enter Quiz Size</h2>
            <form method="post">
                <label for="quiz_size">Quiz Size:</label>
                <input type="text" name="quiz_size" required><br>
                
                <input type="submit" name="create_quiz" value="Create Quiz">
            </form>
        </div>
        <? 
        Session::set('quiz_size', 1);
    }else{
        Session::delete('quiz_size');
        if (isset($_POST['question']) and isset($_POST['option_a']) and isset($_POST['option_b']) and isset($_POST['option_c']) and isset($_POST['option_d']) and isset($_POST['answer']) ) {
            $question=$_POST["question"];
            $option_a=$_POST["option_a"];
    $option_b=$_POST["option_b"];
    $option_c=$_POST["option_c"];
    $option_d=$_POST["option_d"];
    $answer=$_POST["answer"];
    $userName = $userobj->getUsername();
    $collection = $conn->$userName->test;
    $insertOneResult = $collection->insertOne([
        'question' => $question,
        'option_a' => $option_a,
        'option_b' => $option_b,
        'option_c' => $option_c,
        'option_d' => $option_d,
        'answer' => $answer,
    ]);
}
?>  
    <h2>Enter Quiz Name</h2>
    <form method="post">
    <label for="quiz_name">Quiz Name:</label>
    <input type="text" name="quiz_name" required><br>
<?
print_r($_POST);
for($i = 0; $i < $_POST["quiz_size"]; $i++){
?>
        <div>
            <h2>Add Quiz Question</h2>
            
                <label for="question">Question:</label>
                <textarea name="question" rows="4" cols="50" required></textarea><br>

                <label for="option_a">Answer A:</label>
                <input type="text" name="option_a" required><br>

                <label for="option_b">Answer B:</label>
                <input type="text" name="option_b" required><br>

                <label for="option_c">Answer C:</label>
                <input type="text" name="option_c" required><br>

                <label for="option_d">Answer D:</label>
                <input type="text" name="option_d" required><br>

                <label for="answer">Correct Answer:</label>
                <input type="text" name="answer" required><br>

                <input type="submit" value="Submit">
            </form>
        </div><?}
    }
}else if ($userobj->getPrivilage()==1){
    $conn = Database::getMongoConnection();
    $col = $_GET['quizname'];
$cursor = $conn->test->$col->find();
$userAnswers = $_POST;
$userScore = 0;
foreach ($cursor as $questionDocument) {
    $question = $questionDocument["question"];
    $correctAnswer = $questionDocument["answer"];
    $modQ = str_replace(" ", "_", $question);
    if (isset($userAnswers[$modQ]) && $userAnswers[$modQ] === $correctAnswer) {
        $userScore++;
    }
}
$cursor = $conn->test->$col->find();

?>
            <div>
            <h2>Quiz Questions</h2>
            <form method="POST">
                <?php
                    foreach ($cursor as $questionDocument) {
                        $question = $questionDocument["question"];
                        $option_a = $questionDocument["option_a"];
                        $option_b = $questionDocument["option_b"];
                        $option_c = $questionDocument["option_c"];
                        $option_d = $questionDocument["option_d"];
                        $answer = $questionDocument["answer"];
                        echo "<p>$question</p>";
                        // Display answer options (assuming they are stored as an array)
                        echo "<div>";
                        echo "<input type='radio' name='$question' value='$option_a'> $option_a <br>";
                        echo "<input type='radio' name='$question' value='$option_b'> $option_b <br>";
                        echo "<input type='radio' name='$question' value='$option_c'> $option_c <br>";
                        echo "<input type='radio' name='$question' value='$option_d'> $option_d <br>";
                        echo "</div><br>";
                    }
                ?>
                <input type="submit" value="Submit Quiz">
            </form>
        </div>
        <br>
        <?php
// print_r($_POST);
// print_r($_GET);
echo "<div class='result-box'>";
echo "<h2>Your Quiz Score</h2>";
echo "<p class='result-text'>You scored $userScore </p>";
echo "</div>";
if($userScore != 0){
    $conn = Database::getFireConnection();
    $database = $conn->createDatabase();
    $userName = $userobj->getUsername();
    $reference = $database->getReference($userName)->update([$col => $userScore]);
}

// <script>alert('Your quiz score: $userScore');</script>
?>
        
<?
}else{?>
    <div class="container">
	<div class="table-responsive">
		<table class="table table-striped table-sm">
			<thead>
				<tr>
					<th scope="col">Account-number</th>
					<th scope="col">Branch</th>
					<th scope="col">Balance</th>
				</tr>
			</thead>
			<tbody>
				<?php
                $conn = Database::getConnection();
                $query = "SELECT `username`, `branch`, `balance` FROM `User_data` WHERE `privilage` < '2' LIMIT 50;";
                $result = $conn->query($query);
                if ($result->num_rows) {
                    $row = $result->fetch_all();
                } else {
                    return false;
                }
                for ($i=0; $i < $result->num_rows ; $i++) {
                    ?>
				<tr>
					<td><?=$row[$i][0]; ?>
					</td>
					<td><?=$row[$i][1]; ?>
					</td>
					<td><?=$row[$i][2]; ?>
					</td>
				</tr>
				<?php
                }
                ?>
			</tbody>
		</table>
	</div>
</div>
<?
}
