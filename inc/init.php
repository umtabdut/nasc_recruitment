<?php
session_start();
error_reporting(0);
// var_dump($_SESSION);

// $conn = mysqli_connect('localhost', 'root', 'meera');
$conn = mysqli_connect('localhost', 'root', '');
$db = mysqli_select_db($conn, 'recruitment');

/*	=======	CONTACT ME	=======
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

--- ====================================== --- */

if(!$db){
	$conn -> query("CREATE DATABASE recruitment");
}

$_gets = array_keys($_GET);

include_once 'inc/variable.define.php';
include_once 'inc/func.php';

$no_staff = count(getResources($conn)['staffs']) == 0;
$_SESSION['no_staff'] = $no_staff;

$_SESSION['res'] = getResources($conn);

if(isset($_SESSION['is_admin'])) {
	if(isset($_POST['release'])){
		$date = !empty($_POST['release']) ? $_POST['release'] : 0;
		$date_till = !empty($_POST['release_till']) ? $_POST['release_till'] : 0;
		
		if($date > 0 && $date_till > 0)
		{
			$date = strtotime($date);
			$date_till = strtotime($date_till);
			$year = date('Y');

			$chk = $conn->query("SELECT rec_release FROM recruitment_release WHERE rec_year='".$year."' LIMIT 1");
			if($chk->num_rows == 0)
			{
				$chk = $conn->query("INSERT INTO recruitment_release (rec_year, rec_release, rec_release_till, rec_releaser) VALUES ('$year', '$date', '$date_till', '".$_SESSION['user_id']."')");
				if($chk) { ?> <script> alert('Release date added successfullly!'); </script> <?php }
				else{  ?> <script> alert('Release add failed!'); </script> <?php }
			}
			else if(date('Y', $date) == $year){
				//Update if is current year
				$chk = $conn->query("UPDATE recruitment_release SET rec_release='$date', rec_release_till='$date_till', rec_releaser='".$_SESSION['user_id']."' WHERE rec_year='$year'");
				if($chk) { ?> <script> alert('Release date update successfullly!'); </script> <?php }
				else{ ?> <script> alert('Release update failed!'); </script> <?php }
			}
		}
	}
	elseif(isset($_POST['start_date'])){
		$date = !empty($_POST['start_date']) ? $_POST['start_date'] : 0;
		$date_till = !empty($_POST['end_date']) ? $_POST['end_date'] : 0;
		
		if($date > 0 && $date_till > 0)
		{
			$date = strtotime($date);
			$date_till = strtotime($date_till);
			$year = date('Y');

			$chk = $conn->query("SELECT rec_start FROM recruitment_release WHERE rec_year='".$year."' LIMIT 1");
			if($chk->num_rows == 0)
			{
				$chk = $conn->query("INSERT INTO recruitment_release (rec_year, rec_release, rec_release_till, rec_releaser) VALUES ('$year', '$date', '$date_till', '".$_SESSION['user_id']."');");
				if($chk) { ?> <script> alert('Release date added successfullly!'); </script> <?php }
				else{  ?> <script> alert('Release add failed!'); </script> <?php }
			}
			else if(date('Y', $date) == $year){
				//Update if is current year
				$chk = $conn->query("UPDATE recruitment_release SET rec_start='$date', rec_stop='$date_till', rec_setter='".$_SESSION['user_id']."' WHERE rec_year='$year'");
				if($chk) { ?> <script> alert('Application date update successfullly!'); </script> <?php }
				else{ ?> <script> alert('Application date update failed!'); </script> <?php }
			}
		}
	}

	
	if(isset($_POST['addStaff']))
	{
		extract($_POST);
		unset($_POST['addStaff']);

		if(empty($firstname) || empty($username)  || empty($firstname)  || empty($lastname)  || empty($email)  || empty($phone)  || empty($gender) || empty($dob)  || empty($password)  || empty($password2))
		{
			echo '<div style="background: #ff5555; padding: .3em; color: #f9f9f9;">Fill all the fields!</div>';
		}
		else
		{

			if(($password !== $password2) || !is_email($email)){
				echo '<div style="background: #ff5555; padding: .3em; color: #f9f9f9;">Invalid E-mail Address, or passwords doesn\'t matched!</div>';
			}
			else
			{
				$q = "SELECT staff_id FROM staffs WHERE email='".strtolower(trim($email))."' ||  username='".strtolower(trim($username))."' ||  phone='".strtolower(trim($phone))."';";
				$sql = $conn->query($q);
				if($sql->num_rows > 0)
				{
					echo '<div style="background: #ff5555; padding: .3em; color: #f9f9f9;">There is a staff with Username: '.$username.', Phone: '.$phone.' or E-mail Address: '.$email.'!</div>';
				}
				else
				{
					$insert = "INSERT INTO staffs ";
					$insertCol=$insertVal='(';

					unset($_POST['password2']);
					foreach ($_POST as $key => $value) {
						$insertCol .= $key .", ";
						if($key == 'password'){ $insertVal .= "'".my_hash($value)."', "; }
						elseif($key == 'dob'){ $insertVal .= "'".strtotime(sanitize($conn, $value))."', "; }
						else { $insertVal .= "'".sanitize($conn, $value) ."', "; }
					}
					$insertCol = preg_replace('/, $/', ", reg)", $insertCol);
					$insertVal = preg_replace('/, $/', ", '".time()."')", $insertVal);
					$insert  .= $insertCol .' VALUES '. $insertVal;

					if($conn->query($insert)){
						unset($_POST);
						if($_SESSION['no_staff']){
							$_SESSION['user_id'] = $conn->insert_id;
							$_SESSION['is_admin']=true;					
						} else { ?> <script> alert('Staff added successfullly!'); </script> <?php }
					}
				}
			}

		}
	}

}


//Release date
$_SESSION['shortlist']=false;
$_SESSION['application']=false;
$chk = $conn->query("SELECT rec_start, rec_stop, rec_release, rec_release_till FROM recruitment_release WHERE rec_year='".date('Y')."' LIMIT 1");

if($chk->num_rows > 0){
	$row=$chk->fetch_assoc();
	$time = time();
	if( $time > $row['rec_release'] && $time  < $row['rec_release_till'])
	{
		$_SESSION['shortlist']=true;
	}

	if($time > $row['rec_start'] && $time < $row['rec_stop'])
	{
		$_SESSION['application']=true;
	}
	$_SESSION['rec_start'] = $row['rec_start'];
	$_SESSION['rec_stop'] = $row['rec_stop'];
}
