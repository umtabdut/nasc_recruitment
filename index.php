<?php include 'inc/header.php'; ?>

<div class="welcome">
	<img class="banner" src="wp-contents/banner.png">
	<div class="wrap" style="margin: 0 auto; max-width: 1200px; border: 1px solid transparent; position: relative;">
		<div>
			<h1>Welcome to <?= ORG ?> Online recruitment Portal</h1>
			<?php if(isset($_SESSION['is_admin'])){
				echo '<p>Hello user, you can manage '.ORG.'\'s Online recruitment in one place</p>
				<center>
					<a class="btn" href="dashboard.php">'.(!logged_in() ? 'Start' : 'Continue') .' Go to Dashboard</a>
				</center>';
			}
			else if(!isset($_SESSION['submitted']))
			{
				echo '<p>Registration is on going till <span data-date-left>...</span></p>
				<center>
					<a class="btn" href="apply.php">'.(!logged_in() ? 'Start' : 'Continue') .' Application</a>
				</center>';
			} else	{
				echo '<div style="font-size: 1.25em; color: #555; margin-top: 1em; padding-top: 1em; border-top: 1px solid rgba(0,0,0,.05); text-shadow: none;">
					Hello!, dear valued Applicant you have already submitted your application, wait for the release of shortlist.
				</div>';
			} ?>
		</div>
	</div>
</div>

<?php include 'inc/footer.php'; ?>