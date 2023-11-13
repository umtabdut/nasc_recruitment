<?php include_once 'inc/init.php'; ?>

<!-- ======	CONTACT ME	=======
	UMAR TAHIR BAKO

	I Offer the following:-

	Web Development,
	Type Setting,
	Graphics Design,
	Prointing; and
	Photocopy e.t.c

	For more of this services and creations kindly contact me on
	
	Tel:	+234 (0)8131168825,
			+234 (0)9024066380

	MyEmail: umartahirbako@gmail.com

	MyFullName: 	Umar Tahir Bako
	Facebook: 		www.facebook.com/profile.php?id=100008707058344
	FacebookPage: 	www.facebook.com/profile.php?id=100090410096079
	
	WhatsApp: wa.me/2348131168825
	WhatsApp: wa.me/2349024066380

--- ====================================== -->

<!DOCTYPE html>
<html>
<head>
	<title><?= (!isset($title) || $title == '' ? 'Online Recruitment' : $title ) ?></title>
	<link rel="shortcut icon" type="images/jgp" href="wp-contents/icon.png?PP">
	<link rel="stylesheet" type="text/css" href="styles/main.css">
	<link rel="stylesheet" type="text/css" href="styles/applicant.css">
	<script href="<?= SITE ?>/script/jquery-3.4.0-jquery.min.js"></script>
</head>
<body>
<header>
	<img class="logo" src="wp-contents/logo-sm.png" alt="Logo">
	<nav>
		<ul>
			<li>
				<a href="index.php">Home</a>
			</li>
			<li>
				<a href="about.php">About</a>
			</li>

		<?php 
			if(isset($_SESSION['is_admin']) || $_SESSION['shortlist'] == true)
			{
				echo '<li>
					<a href="shortlist.php">Shortlist</a>
				</li>';
				if(isset($_SESSION['is_admin'])){
					echo '
					<li>
						<a href="dashboard.php">Dashboard</a>
					</li>';
				}
			}

			if(logged_in()){

			if(PAGE_NAME != 'apply' && $_SESSION['application'] == true && !isset($_SESSION['submitted']) && isset($_SESSION['is_user'])){
				echo '
				<li>
					<a href="apply.php">Continue Application</a>
				</li>';
			}

			if(!isset($_SESSION['is_admin'])){
				echo '<li>
					<a href="preview.php?id='.$_SESSION['user_id'].'">'.(isset($_SESSION['submitted']) ? 'Print' : 'Preview').' Application</a>
				</li>';
			}?>
			
			<li>
				<a href="logout.php">Logout</a>
			</li>
		<?php } else {
			echo !$_SESSION['application'] ? '' : '<li>
				<a href="apply.php">Apply</a>
			</li>'; ?>
			
			<li>
				<a href="login.php">Login</a>
			</li>
		<?php } ?>
		</ul>
	</nav>
</header>
<main>

<?php // var_dump($_SESSION);


if($no_staff) {
	echo '<br><br><br><br><br>
	<div style="padding: 2em;">
	<h1>Site starts successfully!</h1>
	<br><br>
	No staff added yet, begin to add yourself.
	<br><br>';
	
		echo addStaff($conn);

	echo '</div>';
	include 'inc/footer.php'; die;
}