<?php
$username = Session::get('session_username');
$userobj = new User($username);
?>

<div class="container">
	<header
		class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
		<a href="<?=get_config("base_name")?>index"
			class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
			<span class="fs-4"><strong>Omega</strong></span>
		</a>

		<ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
			<li><a href="<?=get_config("base_name")?>index"
					class="nav-link px-2 link-dark">Home</a></li>
			<li><a href="<?=get_config("base_name")?>quiz"
					class="nav-link px-2 link-dark">Quiz</a></li>
			<?if($userobj->getPrivilage() == 1){?>
			<li><a href="<?=get_config("base_name")?>history"
					class="nav-link px-2 link-dark">History</a></li>
					<?}?>
		</ul>

		<div class="col-md-3 text-end">
			<a href="<?=get_config("base_name")?>logout"
				class="nav-link px-2 link-dark"><button type="button" class="btn btn-primary">Logout</button></a>
		</div>
	</header>
</div>