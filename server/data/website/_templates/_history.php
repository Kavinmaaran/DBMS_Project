<?php
$username = Session::get('session_username');
$userobj = new User($username);
$branch = $userobj->getBranch();
if($userobj->getPrivilage()==2){?>
    <div class="container">
    <h1 class="mt-5"><?=$userobj->getUsername();?></h1>
    <h2 class="mt-5">BALANCE : Rs <?=$userobj->getBalance();?></h2>
 </div><?
}else if ($userobj->getPrivilage()==1){?>
    <div class="container">
	<div class="table-responsive">
		<table class="table table-striped table-sm">
			<thead>
				<tr>
					<th scope="col">Quiz Name</th>
					<th scope="col">Score</th>
				</tr>
			</thead>
			<tbody>
				<?php
$conn = Database::getFireConnection();
$database = $conn->createDatabase();
$reference = $database->getReference($username);

$snapshot = $reference->getSnapshot();
$history = $snapshot->getValue();
foreach ($history as $key => $value) {
                    ?>
				<tr>
					<td><?=$key; ?>
					</td>
					<td><?=$value; ?>
					</td>
				</tr>
				<?php
                }
                ?>
			</tbody>
		</table>
	</div>
</div><?
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
