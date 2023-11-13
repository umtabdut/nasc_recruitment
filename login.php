<?php $title = 'Login'; include 'inc/header.php'; ?> 
<style>
	form{
		flex: 1;
		display: grid;
		flex-direction: column;
		grid-gap: .75em;
	}
	form div{
		display: flex;
	}
	form div *:nth-child(1){
		flex: 2;
	}
	form div *:nth-child(2){
		flex: 6;
	}
	input {
		height: 3em;
	}

</style>
<div style="max-width: 800px; min-height: 80vh; display: flex; align-items: center; margin: 0 auto;">

<?php if(!logged_in()){	?>
		<form class="login" method="post">
			<?php
				$email=$fullname=$password='';
				if(isset($_GET['email'])){
					$email = $_GET['email'];
				}
				if(isset($_POST['login'])){
					$hndl = handleLogin($conn);
					$email=$_POST['email'];
					$password=$_POST['password'];
					$cls = ($hndl['status'] == 0) ? 'fail' : 'success';
				}
				// $rrr = 'umtab2023';
				// echo my_hash($rrr);
			?>

			<h1><?= ORG ?></h1>
			<h2>Login</h2>
			<?php if(!empty($hndl['text'])){
				echo '<p class="'.$cls.'">'.$hndl['text'].'</p>';
			} ?>
			<div>
				<label>Email Address</label>
				<input type="text" name="email" placeholder="Provide Valid Email Address" value="<?= $email ?>">
			</div>
			<div>
				<label>Password</label>
				<input type="password" name="password" placeholder="Enter Password" value="<?= $password ?>">
			</div>

			<button class="btn" type="submit" name="login">Login</button>
			<div>
				<p>If you did'nt have an account <a class="btn" href="apply.php">Creat Account</a> instead</p>
			</div>

		</form>

	<?php
	}
	else
	{
		echo 'aa';
		sleep(3);
		header("location: index.php");
	}
?>



<?php include 'inc/footer.php'; ?>
