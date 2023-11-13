<?php
function sanitize($conn, $str){
	return mysqli_real_escape_string($conn, htmlentities(trim($str)));
}

function my_hash($srt){
	return password_hash('?d34'.$srt.'/23', PASSWORD_DEFAULT);
}

function my_verify($password, $hash){
	return password_verify('?d34'.$password.'/23', $hash);
}

function logged_in(){
	return isset($_SESSION['user_id']);
}

function is_email($string)
{
	return preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $string);
}

function is_mine($id)
{
	$id = (int) $id;
	$uid = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
	if(isset($id) && isset($uid))
	{
		return ($id == $uid) ? true : false;
	}
	else
	{
		return false;
	}
}
function protect_admin(){ if(!isset($_SESSION['is_admin'])){
	header('location: index.php'); exit();
}}

function pre($arr){
	return '<pre>'.var_dump($arr, false).'</pre>';
}

function application_release($conn){
	$chk = $conn->query("SELECT rec_start, rec_stop, rec_release, rec_release_till FROM recruitment_release WHERE rec_year='".date('Y')."' LIMIT 1");
	$text=$text2='';
	if($chk->num_rows > 0){
		$row = $chk->fetch_assoc();
		if($row['rec_release'] > 0 || $row['rec_release'] > 0){
			$text='<div>
			Release Date: <b>'. date('d-m-Y', $row['rec_release']) .'</b> Release Till Date: <b>'. date('d-m-Y', $row['rec_release_till']).'</b></div> <br>';
		} else { $text='<div>Set Application Release/End dates</div> <br>';
		}
		if($row['rec_start'] > 0 || $row['rec_stop'] > 0){
			$text2='<div>
			Starts on: <b>'. date('d-m-Y', $row['rec_start']) .'</b> Stops on: <b>'. date('d-m-Y', $row['rec_stop']).'</b></div> <br>';
		} else {
			$text2='<div>Set Starts and End of Application period</div> <br>';
		}
	}
	$output = '<br>
	<form method="post">
		'.$text2.'
		Starts on:
		<input type="date" name="start_date" value="'.( isset($row['rec_start']) ? date('d-m-Y', $row['rec_start']) : '2019/09/09' ).'">
		<br>
		Stops on:
		<input type="date" name="end_date" value="'.( isset($row['rec_stop']) ? date('d-m-Y', $row['rec_stop']) : '2019/09/09' ).'">
		<br>
		<button class="btn btn-default">SET</button>
	</form>
	<br>
	<form method="post">
		'.$text.'
		Set Release date:
		<input type="date" name="release" value="'.( isset($row['rec_release']) ? date('d-m-Y', $row['rec_release']) : '2019/09/09' ).'">
		<br>
		Set Release Till:
		<input type="date" name="release_till" value="'.( isset($row['rec_release_till']) ? date('d-m-Y', $row['rec_release_till']) : '2019/09/09' ).'">
		<br>
		<button class="btn btn-default">SET</button>
	</form>
	<br>';

	return $output;
}
function handleCreate($conn){
	extract($_POST);
	// var_dump($_POST); die;

	$status=0; $text='Empty Fullname/Email';
	//Check DB

	if(!empty($fullname) && !empty($email)){
		if(!is_email($email)){
			$text = 'Invalid Email Address';
		}
		else
		{
			$chk = $conn -> query("SELECT uid, reg_token, activate FROM users WHERE email='". sanitize($conn, trim($email)) ."' LIMIT 1;");
			if($chk -> num_rows > 0){
				$row = $chk->fetch_assoc();
				$status = 2;
				$text = 'You have already created an account, proceed to <a href="activate.php?email='.$email.'&token='.$row['reg_token'].'">Activate Account</a> to activate your account go to your Email account and click on PROCEED button to complete registration';
				
				if($row['activate'] == 1){
					$text = 'You have already created an account, proceed to <a href="login.php?email='.$email.'">Login</a> and continue registration.';
				}
			}
			else
			{

				$token = substr(str_shuffle(CHARS), 0, 50);
				$time = time();
				$chk = $conn -> query("INSERT INTO users (fullname, email, reg_date, reg_token) VALUES ('". sanitize($conn, trim($fullname)) ."', '". sanitize($conn, trim($email)) ."', '".$time."', '".$token."')");
				if($chk){

					// $rec = $conn->query("INSERT IN recruitment (uid, fname, mname, lname, gender, dob, address, lga, state, address_2, lga_2, state_2, country, nin, declaration_upload, indigene_upload, nin_upload, phone, phone_2, name_primary, name_secondary, name_tertiary, result_primary, result_secondary, result_secondary_2, result_tertiary, result_tertiary_2, result_primary_upload, result_secondary_upload, result_secondary_2_upload, result_tertiary_upload, result_tertiary_2_upload, result_secondary_details, result_secondary_2_details, result_tertiary, result_tertiary_2, apply_for, apply_date, apply_submit, apply_approve, apply_approver, apply_approve_date) VALUES ()";

					// var_dump($chk);
					// var_dump($conn);
					// die;

					$uid = $conn->insert_id;
					$char = 'AAAABBBBCCCCDDDDEEEEFFFFGGGGHHHHIIIIJJJJKKKKLLLLMMMMNNNNOOOOPPPPQQQQRRRRSSSSTTTTUUUUVVVVWWWWXXXXYYYYZZZZ';
					$randChar = substr(str_shuffle($char), 0, 6);

					$conn->query("INSERT INTO secondary_details (uid) VALUES ('".$uid."')");
					$conn->query("INSERT INTO recruitment (uid, rand_char, year, apply_date) VALUES ('".$uid."', '".$randChar."', '".date('Y')."', '".$time."')");

					$sent = mail($email, ORG .' - Complete registration', 'Hello '. strtoupper($fullname) .', you are to complete rigistration with '. ORG .', to continue click <a style="background: blue; color: #fff; font-weight: 600;" href="'.SITE.'/activate.php?email='.$email.'&token='.$token.'">PROCEED</a>. Or else ignor if you do not intend to do so.');

					if($sent){
						$text = 'Account created sucessfully!, an Email with activation key was sent to '. strtolower($email).', open and click on PROCEED button to complete registration';
						$status = 1;
					}
				}
				else{
					$text = 'Faild to created account, try again!';
					// $text .= $conn->error;
					$status = 0;
				}
			}
		}
	}
	return ['text' => $text, 'status' => $status];
}
function updatePass($conn){
	extract($_POST);
	$status=0; $text='Both passwords should not be empty!';

	if($password !== $password2){
		$text = 'Both passwords must matched!';
	}
	elseif(strlen(trim($password)) < 6){
		$text = 'Password must be atleast 6 characters!';
	}
	else{

	}	
}

function handleLogin($conn){
	extract($_POST);

	$status=0; $text='Email/Password Empty!';
	//Check DB

	if(!empty($email) && !empty($password)){
		$chk = $conn -> query("SELECT staff_id, password FROM staffs WHERE username='". sanitize($conn, trim($email)) ."' LIMIT 1;");
		if($chk -> num_rows < 1){
			if(!is_email($email)){
				$text = 'Invalid Email Address';
			} else {
				$chk = $conn -> query("SELECT uid, pass FROM users WHERE email='". sanitize($conn, trim($email)) ."' LIMIT 1;");
				if($chk -> num_rows < 1){
					$text = 'Sorry!, no account with email '.$email.' found, you have to register first
						<a class="btn btn-info" href="apply.php?email='.$email.'">GET STARTED</a>';
						$status = 2;
				}
				else
				{
					$row = $chk->fetch_assoc();
					// var_dump($row); die;
					if(!my_verify($password, $row['pass'])){
						$text = 'Incorrect password!';
					}
					else
					{
						unset($_POST);
						$_SESSION['user_id'] = $row['uid'];
						$_SESSION['is_user']=true;

						$chk = $conn -> query("SELECT apply_submit FROM recruitment WHERE uid='". $_SESSION['user_id'] ."' LIMIT 1;");
						$row = $chk->fetch_assoc();
						// $_SESSION['submitted'] = false;
						if($row['apply_submit'] == 1){
							$_SESSION['submitted'] = true;
						}

						$chk = $conn -> query("SELECT * FROM recruitment WHERE uid='".$row['uid']."';");	
					}
				}
			}

		} else{
			$row = $chk->fetch_assoc();
			// var_dump($row); die;
			if(!my_verify($password, $row['password'])){
				$text = 'Incorrect password!';
			}
			else
			{
				unset($_POST);
				$_SESSION['user_id'] = $row['staff_id'];
				$_SESSION['is_admin']=true;
			}					
		}
	}
	return ['text' => $text, 'status' => $status];
}

function getResources($conn){
	$sql = $conn->query("SELECT * FROM states WHERE 1 ORDER BY st_name;");
	$states = array();
	while ($row = $sql->fetch_assoc()) {
		$states[$row['st_id']] = $row['st_name'];
	}
	
	$sql = $conn->query("SELECT * FROM lga WHERE 1 ORDER BY lga_state, lga_name;");
	$lga = array();
	while ($row = $sql->fetch_assoc()) {
		$lga[$row['lga_id']] = ['lga_name' => $row['lga_name'], 'lga_state' => $row['lga_state']];
	}

	$sql = $conn->query("SELECT * FROM recruitment_level WHERE 1;");
	$applies = array();
	while ($row = $sql->fetch_assoc()) {
		$applies[$row['rec_id']] = $row['rec_level'];
	}

	$sql = $conn->query("SELECT * FROM staffs WHERE 1;");
	$staffs = array();
	$dir = 'uploads/users/recruitment/';
	while ($row = $sql->fetch_assoc()) {
		$staffs[$row['staff_id']] = ['fullname' => $row['firstname'].' '.$row['lastname']];
	}

	$sql = $conn->query("SELECT * FROM recruitment, users WHERE recruitment.uid=users.uid;");
	$applicants = array();
	$dir = 'uploads/users/recruitment/';
	while ($row = $sql->fetch_assoc()) {
		// echo '<pre>'; var_dump($row); die;
		$applicants[$row['uid']] = ['rand_char' => $row['rand_char'], 'year' => $row['year'], 'id' => $row['uid'], 'user_rec_id' => $row['rand_char'].'-'.$row['uid'].'-'.$row['year'], 'fullname' => $row['fullname'], 'apply_date' => $row['apply_date'], 'apply_submit' => $row['apply_submit'], 'apply_approve' => $row['apply_approve'],  'profile_upload' => $dir.$row['profile_upload'].'?'.mt_rand(), 'state' => $row['state'], 'dob' => $row['dob'], 'apply_for' => $row['apply_for'], 'lga' => $row['lga'],
		'address' => $row['address'], 'lga_2'  => $row['lga_2'], 'state_2'  => $row['state_2'], 'country' => $row['country'], 'nin' => $row['nin'], 'email' => $row['email'], 'phone' => $row['phone'], 'phone_2' => $row['phone_2'], 'name_primary' => $row['name_primary'], 'name_tertiary' => $row['name_tertiary'], 'name_tertiary_2' => $row['name_tertiary_2'], 'result_primary' => $row['result_primary'], 'result_tertiary' => $row['result_tertiary'], 'result_tertiary_2' => $row['result_tertiary_2'], 'address_2' => $row['address_2']];
	}
	// var_dump($applicants);
	return ['staffs' => $staffs, 'states' => $states, 'lga' => $lga, 'applicants' => $applicants, 'recruitment_level' => $applies];
}

function showResouce($conn, $type, $data){
	$tr='';
	
	$tbl = '<table class="table table-bordered">';
	$tbl_ = '</table>';
	$frm=false;
	if(in_array($_GET['action'], ['edit'])){
		$frm=true;
		// $tbl = '<form style="margin: 1em auto;"><table>';
		$tbl = '<form style="margin: 1em auto;" method="post"><table>';
			if($type == 'lga')
			{
				$tbl .= '<tr>
				<th width="30">S/N</th>
				<th>LGA Name</th>
				<th>L.G.A State</th>
				<th>Actions</th>
				</tr>';
			}
		$tbl_ = '</table></form>';
	}
	else{
		if($type == 'lga')
		{
			$tbl .= '<tr>
			<th width="30">S/N</th>
			<th>LGA Name</td>
			<th>L.G.A State</th>
			<th>Actions</th>
			</tr>';
		}
		elseif($type == 'states')
		{
			$tbl .= '<tr>
			<th width="30">S/N</th>
			<th>State</th>
			<th width="100">No. of L.G.A</th>
			<th>Actions</th>
			</tr>';
		}
		elseif($type == 'applicants')
		{
			$tbl .= '<tr>
			<th width="30">S/N</th>
			<th colspan="2">Applicant\'s Name - <small style="color: #999;"><i>Applying for</i></small> - <small style="color: #999;"><i>Applicant ID</i></small> </th>
			<th  width="200">State - <small style="color: #999;"><i>L.G.A</i></small></th>
			<th width="150">Applied Date</th>
			</tr>';
		}
	}

	$sn=1;
	foreach ($data as $key => $value) {
		if ($frm) {
			if($type == 'lga')
			{
				$tr .= '<tr>
				<td>'.$sn.'</td>
					<td>
						<input type="hidden" name="id" value="'.$key.'">
						<input type="text" name="value" value="'.ucfirst($value['lga_name']).'">
					</td>
					<td>
						<input type="text" value="'.ucfirst($_SESSION['res']['states'][$value['lga_state']]).'" readonly disabled>
					</td>
					<td>
						<select name="value2">
							<option value="'.$value['lga_state'].'">'.ucfirst($_SESSION['res']['states'][$value['lga_state']]).'</option>';
						foreach ($_SESSION['res']['states'] as $sts_id  => $sts_name ){
							if($sts_id == $value['lga_state']){ continue; }
							$tr .= '<option value="'.$sts_id.'">'.ucfirst($sts_name).'</option>';
						}
						$tr .= '</select>			
					</td>
				</tr>';
			}
			elseif($type == 'states')
			{
				$tr .= '<tr>
					<td>
					<input type="hidden" name="id" value="'.$key.'">
						<input type="text" name="value" value="'.ucfirst($value).'">
					</td>
				</tr>';
			}
		}
		else
		{
			if($type == 'lga')
			{
				$tr .= '<tr>
					<td>'.$sn.'</td>
					<td>'.ucfirst($value['lga_name']).'</td>
					<td>'.ucfirst($_SESSION['res']['states'][$value['lga_state']]).'</td>
					<td>
						<a class="btn btn-default" href="dashboard.php?'.$type.'&action=view&id='.$key.'">View</a>
						<a class="btn btn-info" href="dashboard.php?'.$type.'&action=edit&id='.$key.'">Edit</a>
						<a class="btn btn-danger" href="dashboard.php?'.$type.'&action=delete&id='.$key.'">Delete</a>
					</td>
				</tr>';
			}
			elseif($type == 'states')
			{
				$sqlLgas = $conn->query("SELECT * FROM lga WHERE lga_state='$key' ORDER BY lga_name;");
				
				$tr .= '<tr>
					<td>'.$sn.'</td>
					<td>'.ucfirst($value).'</td>
					<td>'.$sqlLgas->num_rows.'</td>
					<td>
						<a class="btn btn-default" href="dashboard.php?'.$type.'&action=view&id='.$key.'">View</a>
						<a class="btn btn-info" href="dashboard.php?'.$type.'&action=edit&id='.$key.'">Edit</a>
						<a class="btn btn-danger" href="dashboard.php?'.$type.'&action=delete&id='.$key.'">Delete</a>
					</td>
				</tr>';
			}
			elseif($type == 'applicants')
			{
				// var_dump($value); die;
				$tr .= '<tr style="color: #333;">
					<td width="30">'.$sn.'</td>
					<td width="80">
						<img src="'.$value['profile_upload'].'" alt="Profile" width="80" height="80">
					</td>
					<td>
						<span>'.$value['fullname'].'</span>
						- <small style="color: #999;"><i>'.ucfirst($_SESSION['res']['recruitment_level'][$value['apply_for']]).'</i></small> <br>
						<small>'.$value['rand_char'].'-'.$value['id'].'-'.$value['year'].'</small>
						&nbsp; &nbsp; &nbsp;
						<a class="btn btn-info" href="preview.php?'.$type.'&action=view&id='.$key.'">View</a>
						<form method="post">
							<input name="uid" value="'.$value['id'].'" type="hidden">
							<button class="btn btn-default" name="apply_approve" value="'.($value['apply_approve'] == 1 ? 'disapprove':'approve').'">'.($value['apply_approve'] == 1 ? 'Disapprove':'Approve').'</button>
							<button class="btn btn-danger" name="apply_approve" value="decline">Decline</button>
						</form>
					</td>
					<td>'.ucfirst($_SESSION['res']['states'][$value['state']]).' - <small style="color: #999;"><i>'.ucfirst($_SESSION['res']['lga'][$value['lga']]['lga_name']).'</i></small></td>
					<td><small style="color: #999;"><i>'.date('D, d M, Y', $value['apply_date']).'</i></small></td>
				</tr>';

				if(isset($_GET['action']) && $_GET['action'] == 'view')
				{
					$tbl_ .= showApplication($conn, $_SESSION['res']['applicants'][$value['id']]);
				}
			}
			elseif($type == 'staffs'){
				$tbl = '<div class="staffs">'.showStaff($conn, $data).'</div>';
			}
		}
		$sn++;
	}
	if(isset($_POST['update'])){
		$update = $_POST['update'];
		// echo '<pre>';
		// var_dump($_POST);
		// echo '</pre>';
		$q = "UPDATE $type SET ";
		if($update == 'states'){
			$q .= "st_name='".sanitize($conn, $_POST['value'])."' WHERE st_id='".sanitize($conn, $_POST['id'])."';";
		}
		elseif($update == 'lga'){
			$q .= "lga_name='".sanitize($conn, $_POST['value'])."', lga_state='".sanitize($conn, $_POST['value2'])."' WHERE lga_id='".sanitize($conn, $_POST['id'])."';";
		}
		if($conn->query($q)){ ?>
			<script>
				alert('Data updated successfull');
			</script>
		<?php }
	}
	if ($frm) {
		$tr .= '<tr>
		<td colspan="99">
		<button type="submit" name="update" value="'.$type.'">UPDATE</button>';
	}

	$html = $tbl . $tr . $tbl_;
	return $html;
}
function showApplication($conn, $array)
{
	// $sql = $conn->query("SELECT * FROM recruitment, users WHERE users.uid='".$uid."' && recruitment.uid='".$uid."';");
	// $row = $sql -> fetch_assoc();
	// echo '<pre>'; var_dump($array);

	echo '<div class="application application-preview">
		<h1>'.ORG.'</h1> <br><br>
		<div class="profile_upload">
			<img src="'.$array['profile_upload'].'" alt="Avatar">
		</div>
		<div class="user_rec_id">
			<span>'.$array['user_rec_id'].'</span>
			<p>Application ID</p>
		</div>

		<div class="details">

			<div class="title">
				<span>Personal Information</span>
			</div>

			<div class="fullname">
				<p>Fullname</p>
				<span>'.$array['fullname'].'</span>
			</div>
			<div>
				<p>Date of Birth</p>
				<span>'.(empty($array['dob']) ? '-' : date('m-d-Y', $array['dob'])).'</span>
			</div>
			<div class="address">
				<p>Address</p>
				<span>'.$array['address'].'</span>
			</div>
			<div class="lga">
				<p>L.G.A</p>
				<span>'.$_SESSION['res']['lga'][$array['lga']]['lga_name'].'</span>
			</div>
			<div class="state">
				<p>State</p>
				<span>'.$_SESSION['res']['states'][$array['state']].'</span>
			</div>
			<div class="lga_2">
				<p>L.G.A 2</p>
				<span>'.$_SESSION['res']['lga'][$array['lga_2']]['lga_name'].'</span>
			</div>
			<div class="state_2">
				<p>State 2</p>
				<span>'.$_SESSION['res']['states'][$array['state_2']].'</span>
			</div>
			<div class="country">
				<p>Country</p>
				<span>'.$array['country'].'</span>
			</div>
			<div class="nin">
				<p>NIN</p>
				<span>'.$array['nin'].'</span>
			</div>

			<div class="title">
				<span>Contact Information</span>
			</div>
			<div class="phone">
				<p>Phone</p>
				<span>'.$array['phone'].'</span>
			</div>
			<div class="email">
				<p>Email</p>
				<span>'.$array['email'].'</span>
			</div>
			<div class="phone_2">
				<p>Phone 2</p>
				<span>'.$array['phone_2'].'</span>
			</div>

			<div class="title">
				<span>Educational Qualification</span>
			</div>
			<div class="name_primary">
				<p>Primary School</p>
				<span>'.$array['name_primary'].'</span>
			</div>
			<div class="name_tertiary">
				<p>Tertiary</p>
				<span>'.$array['name_tertiary'].'</span>
			</div>
			<div class="name_tertiary_2">
				<p>Tertiary 2</p>
				<span>'.$array['name_tertiary_2'].'</span>
			</div>
			<div class="result_primary">
				<p>Primary Result</p>
				<span>'.$array['result_primary'].'</span>
			</div>
			<div class="result_tertiary">
				<p>Tertiary Result</p>
				<span>'.$array['result_tertiary'].'</span>
			</div>
			<div class="result_tertiary_2">
				<p>Tertiary Result 2</p>
				<span>'.$array['result_tertiary_2'].'</span>
			</div>

			<div class="title">
				<span>Application requested</span>
			</div>
			<div class="apply_for">
				<p>Applying for</p>
				<span>'.$_SESSION['res']['recruitment_level'][$array['apply_for']].'</span>
			</div>'.


			str_repeat('<br><br><br>
			<div class="title">
				<span>Referee Information</span>
			</div>
			<div>
				<p></p>
				<p style="border: 1px solid #333; max-width: 100px; height: 150px; text-align: center;">
					<br><br><br><br>
					Passport 
				</p>
			</div>
			<div>
				<p>Fullname</p>
				<span>&nbsp;<hr></span>
			</div>
			<div>
				<p>Address</p>
				<span>&nbsp;<hr></span>
			</div>
			<div>
				<p>Occupation</p>
				<span>&nbsp;<hr></span>
			</div>
			<div>
				<p>Rank</p>
				<span>&nbsp;<hr></span>
			</div>
			<div>
				<p>Phone</p>
				<span>&nbsp;<hr></span>
			</div>
			<div>
				<p>Email</p>
				<span>&nbsp;<hr></span>
			</div>
			<div>
				<br>
				I '.str_repeat('_', 40).' acknowledge that '.strtoupper($array['fullname']).' is well known to me and is of good character. I also bear witness that information provided by the applicant is true.
			</div>
			<div>
				'.str_repeat('<p></p>', 4).'
				<span> <br>'.str_repeat('_', 22).'
					<p>Signature '.str_repeat('&nbsp;', 6).'</p>
				</span>
				
				<span> <br>'.str_repeat('_', 22).'
					<p>Date '.str_repeat('&nbsp;', 8).'</p>
				</span>
				'.str_repeat('<p></p>', 2).'
			</div>', 3) .'

			<br><br><br>
			<div>
				<p style="text-align: left; border: 1px solid #333; padding: .25em;">
					<b>N.B</b>
					This form should be filled and a copy must be submitted to the Office of the Chairman of '. ucwords($_SESSION['res']['lga'][$array['lga']]['lga_name']) .' for information and documetation purpose.
				</p>
				
			</div>
			<div>
				<p style="text-align: center;">
					&copy; - '.ORG.' '. date('Y') .'
				</p>
			</div>

		</div>

	</div>';
}

function showStaff($conn, $array){
	$output='';
	foreach ($array as $key => $value) {
		$output .= '<div class="staff">
			<img src="wp-contents/avatar.png" alt="Avatar" width="50" height="50">
			<div>'.$value['fullname'].'</div>
		</div>';		
	}
	return $output;
}

function addForm($conn,$type){
	extract($_POST);

	$exist=false;
	if(isset($_POST['add']) && in_array($type, ['lga', 'states']) && strlen(trim($value)) > 2)
	{

		if($type == 'lga')
		{
			$q = "SELECT lga_name FROM lga WHERE lga_name='".strtolower(trim($value))."' && lga_state='".$value2."';";
			$insert = "INSERT INTO $type (lga_name, lga_state) VALUES ('".sanitize($conn, $value)."', '".sanitize($conn, $value2)."')";
		}
		elseif($type == 'states')
		{
			$q = "SELECT st_name FROM states WHERE st_name='".strtolower(trim($value))."';";
			$insert = "INSERT INTO $type (st_name) VALUES ('".sanitize($conn, $value)."')";
		}

		$sql = $conn->query($q);
		$exist = $sql->num_rows > 0;

		if($exist){ ?>
			<script>
				alert('Already exists');
			</script>
		<?php } elseif($conn->query($insert)){ unset($_POST); ?>
			<script>
				alert('Data saved successfull');
			</script>
		<?php }
		// echo $q; die;
	}
	
	$fm=$input2='';
	if($type == 'lga'){
		$input2 = '<select name="value2">
			<option value="0">Select State</option>';
		foreach ($_SESSION['res']['states'] as $sts_id  => $sts_name ){
			$input2 .= '<option value="'.$sts_id.'">'.ucfirst($sts_name).'</option>';
		}
		$input2 .= '</select>';
	}

	$fm .= '<div>
		<h2>Add '. $type.'</h2>
		<form method="post">
			<input name="value" value="'.(isset($_POST['value']) ? $_POST['value'] : '').'" placeholder="Enter '.$type.' here" autofocus>'
			.$input2.'
			<button type="submit" name="add" value="'.$type.'">Add</button>
		</form>
	</div>';

	return $fm;
}

function addStaff($conn){
	$fm = '<div>
		<form method="post">
			<h2>Add New Staff</h2>
			<input type="text" name="username" value="'.(isset($_POST['username']) ? $_POST['username'] : '').'" placeholder="Choose Username" autofocus>
			<input type="text" name="firstname" value="'.(isset($_POST['firstname']) ? $_POST['firstname'] : '').'" placeholder="Firstname">
			<input type="text" name="lastname" value="'.(isset($_POST['lastname']) ? $_POST['lastname'] : '').'" placeholder="Lastname">
			<input type="email" name="email" value="'.(isset($_POST['email']) ? $_POST['email'] : '').'" placeholder="Email Address">
			<input type="text" name="phone" value="'.(isset($_POST['phone']) ? $_POST['phone'] : '').'" placeholder="Phone Number">
			<select name="gender">
				<option value="m">Male</option>
				<option value="f">Female</option>
			</select>
			<select name="type">
				<option value="0">Staff Type</option>
				<option value="0">Deafult</option>
				<option value="2">Moderator</option>
				<option value="1">Admin</option>
			</select>
			<input type="date" name="dob" value="'.(isset($_POST['dob']) ? date('d-m-Y', $_POST['dob']) : '').'" placeholder="Date of Birth">		
			<input type="password" name="password" value="'.(isset($_POST['password']) ? $_POST['password'] : '').'" placeholder="Password">
			<input type="password" name="password2" value="'.(isset($_POST['password2']) ? $_POST['password2'] : '').'" placeholder="Confirm Password">
		
			<button type="submit" name="addStaff">Add</button>
		</form>
	</div>';
	return $fm;
		
}
function recruitmentForm($conn, $uid){
	$output=$msg='';

	$chk = $conn->query("SELECT apply_submit FROM recruitment WHERE uid='".sanitize($conn, $uid)."' && apply_submit='1';");
	if($chk->num_rows > 0){ return '<div style="min-height: 80vh; display: flex; align-items: center; margin: 0 auto; text-align: center; max-width: 800px;">
		<form style="flex: 1; padding: 3em 1em;">Application alredy submited</form>
		</div>'; }

	if(isset($_POST['save'])){
		$sv = saveForm($conn, $_POST);

		$text = $sv['text'];
		$cls = $sv['status'] > 0 ? 'success' : 'failed';
		$msg = '<p class="'.$cls.'">'.$text.'</p>';
	}
	$output .= $msg;
	
	$sql = $conn->query("SELECT * FROM states WHERE 1 ORDER BY st_name;");
	$states = array();
	while ($row = $sql->fetch_assoc()) {
		$states[$row['st_id']] = $row['st_name'];
	}
	
	$sql = $conn->query("SELECT * FROM lga WHERE 1 ORDER BY lga_name;");
	$lga = array();
	while ($row = $sql->fetch_assoc()) {
		$lga[$row['lga_id']] = $row['lga_name'];
	}

	$sql = $conn->query("SELECT * FROM recruitment_level;");
	$level = array();
	while ($row = $sql->fetch_assoc()) {
		$level[$row['rec_id']] = $row['rec_level'];
	}

	$sql = $conn->query("SELECT * FROM subject_type;");
	$subject_type = array();
	while ($row = $sql->fetch_assoc()) {
		$subject_type[$row['sbj_type_id']] = $row['sbj_type_abbrev'];
	}

	$sql = $conn->query("SELECT * FROM subjects;");
	$subjects = array();
	while ($row = $sql->fetch_assoc()) {
		$subjects[$row['subj_id']] = $row['subj_name'];
	}

	$sql = $conn->query("SELECT * FROM subject_grade;");
	$grades = array();
	while ($row = $sql->fetch_assoc()) {
		$grades[$row['grd_id']] = $row['grd_char'];
	}
	
	$q['personal_information'] = "SELECT apply_for, first_name, middle_name, last_name, phone, phone_2, gender, date_of_birth, address,  state, lga, address_2, state_2, lga_2, country, nin FROM recruitment WHERE uid='".sanitize($conn, $uid)."';";

	$q['educational_information'] = "SELECT name_primary, result_primary, name_secondary,
		name_tertiary, result_tertiary, name_tertiary_2, result_tertiary_2 FROM recruitment WHERE uid='".sanitize($conn, $uid)."';";

	$subjects_slct='';
	for($i=1; $i<10; $i++){
		$subjects_slct .= 'sbj_'.$i.'_type, sbj_'.$i.', sbj_'.$i.'_grd, sbj_'.$i.'_exam_number, ';
	}

	$subjects_slct = preg_replace('/, $/', '', $subjects_slct);

	// echo $subjects_slct;

	$q['secondary_details'] = "SELECT ". $subjects_slct ." FROM secondary_details WHERE uid='".sanitize($conn, $uid)."';";

// echo $q['secondary_details'];

	$q['upload'] = "SELECT profile_upload, nin_upload, declaration_upload, indigene_upload, result_primary_upload, result_secondary_upload, result_secondary_2_upload, result_tertiary_upload, result_tertiary_2_upload FROM recruitment WHERE uid='".sanitize($conn, $uid)."';";

	// $q = "SELECT * FROM recruitment WHERE uid='".sanitize($conn, $uid)."';";

	$form = 'personal_information';
	$forms = ['personal_information', 'educational_information', 'secondary_details', 'upload'];
	if(count($_GET) > 0){
		$form_get = array_keys($_GET)[0];
		if(in_array($form, $forms)){
			$form = $form_get;
		}
	}

	$chk = $conn->query($q[$form]);
	$arr = $chk -> fetch_assoc();

	if($form == 'secondary_details'){
		$inp = preg_replace('/[^a-z0-9]+/i', ' ', $form);
		
		$table='<div style="flex: 1; border: 1px solid red;">
		<div class="detail">
		<label>Exam Type</label>
		<label>Subject</label>
		<label>Grade</label>';

		$table='
		<style>
			select{
				display: block;
				width: 100%;
			}
		</style>

		<table style="min-width: 100%; margin-bottom: 1em;">
		<tr>
			<td colspan="99">
				<label>
				'.strtoupper($inp).' <em>(Result should not be more than 2 sittings)</em>
				</label>
			</td>
		</tr>
		<tr>
			<th>
				<label>Exam Type</label>
			</th>
			<th>
				<label>Subject</label>
			</th>
			<th>
				<label>Grade</label>
			</th>
			<th>
				<label>Exam No.</label>
			</th>
		</tr>';
		$inp = '';
		//$opts['result_secondary_details'][$i]['subject']
		for($i=1; $i<10; $i++){
			$table .= '<tr>';

			$table .= '<td>
			<select name="sbj_'.$i.'_type">';
				$sbj_t = $arr['sbj_'.$i.'_type'];
				if($sbj_t > 0)
				{
					$table .= '<option value="'.$sbj_t.'">'.strtoupper($subject_type[$sbj_t]).'</option>';
				}
				else
				{
					$table .= '<option value="0">Select Exam Type</option>';
				}
				// var_dump($subject_type);

				foreach ($subject_type as $subj_t_id => $subj_t_abbrev) {
					if($subj_t_id == $sbj_t) { continue; }
					$table .= '<option value="'.$subj_t_id.'">'.strtoupper($subj_t_abbrev).'</option>';
				}
			$table .= '</select>
			</td>';

			$table .= '<td>
			<select name="sbj_'.$i.'">';
				$sbj = $arr['sbj_'.$i];
				if($sbj > 0)
				{
					$table .= '<option value="'.$sbj.'">'.strtoupper($subjects[$sbj]).'</option>';
				}
				else
				{
					$table .= '<option value="0">Select Subject</option>';
				}
				foreach ($subjects as $sbj_id => $subject) {
					if($sbj == $sbj_id) { continue; }
					$table .= '<option value="'.$sbj_id.'">'.strtoupper($subject).'</option>';
				}
			$table .= '</select>
			</td>';

			$table .= '<td>
			<select name="sbj_'.$i.'_grd">';
				$sbj_grd = $arr['sbj_'.$i.'_grd'];
				if($sbj_grd > 0)
				{
					$table .= '<option value="'.$sbj_grd.'">'.strtoupper($grades[$sbj_grd]).'</option>';
				}
				else
				{
					$table .= '<option value="0">Select Grade</option>';
				}
				foreach ($grades as $grd_id => $grd) {
					if($sbj_grd == $grd_id) { continue; }
					$table .= '<option value="'.$grd_id.'">'.strtoupper($grd).'</option>';
				}
			$table .= '</select>
			</td>';

			$table .= '<td>
				<input style="text-transform: uppercase;" name="sbj_'.$i.'_exam_number" type="text" value="'.$arr['sbj_'.$i.'_exam_number'].'" placeholder="e.g 7837328472GH">
			</td>';
			$table .= '</tr>';
		}
		$table.='</table>';
	}
	else
	{
		$table = '';

		foreach ($arr as $key => $value) {
			$prev=$upl='';
			$inp = preg_replace('/[^a-z0-9]+/i', ' ', $key);
			$type = 'type="text"';
			$valueAttr = 'value="'.$value.'"';
			$valueAttr .= ' placeholder="'.$value.'"';

			if(preg_match('/date/', $key)){
				$type = 'type="date"';
				if($value == '0')
				{
					$valueAttr = '';
				}
				else
				{
					$valueAttr = 'value="'.date('Y-m-d', $value).'"';
				}
			}
			elseif(preg_match('/upload/', $key)){
				$dir = 'uploads/users/recruitment/'.$value;
				if(!file_get_contents($dir)){
				// if(!0){
					$upload_label ='UPLOAD';
				}
				else{
					$upload_label = 'UPDATE';
					$prev= '<div class="upload">
						<center>
						<img src="'.$dir.'?'.mt_rand().'" id="'.$key.'_0" width="60" height="80" alt="'.preg_replace('/'.$uid.'\_/', '', $value).'"/>
						</center>
					</div>';
				}
				$type = ' id="'.$key.'" type="file" accept="image/*"';
				$valueAttr = '';
				$upl .= '
				<label class="btn" for="'.$key.'">'.$upload_label.'</label>';
			}
			elseif(preg_match('/address/', $key)){
				$type .= ' style="height: 50px;"';
			}

			$input = '<input '.$type.' name="'.$key.'" '.$valueAttr.'>';
			
			if(preg_match('/gender/', $key)){
				if($value == 'm')
				{
					$input = '<select name="'.$key.'">
						<option value="m">Male</option>
						<option value="f">Female</option>
					</select>';
				}
				elseif($value == 'f')
				{
					$input = '<select name="'.$key.'">
						<option value="f">Female</option>
						<option value="m">Male</option>
					</select>';
				}
				else
				{
					$input = '<select name="'.$key.'">
						<option>Choose gender</option>
						<option value="m">Male</option>
						<option value="f">Female</option>
					</select>';
				}
			}
			elseif(preg_match('/state/', $key) || preg_match('/lga/', $key)){
				$input = '<select name="'.$key.'">';
					if(preg_match('/state/', $key)){
						if($value > 0){
							$input .= '<option value="'.$value.'">'.ucfirst($states[$value]).'</option>';
						}
						else{
							$input .= '<option value="0">Select '.$key.'</option>';
						}

						foreach ($states as $st_key => $st_value) {
							if($st_key == $value){ continue; }
							$input .= '<option value="'.$st_key.'">'.ucfirst($st_value).'</option>';
						}
					}
					else
					{
						if($value > 0){
							$input .= '<option value="'.$value.'">'.ucfirst($lga[$value]).'</option>';
						}
						else
						{
							$input .= '<option value="0">Select '.$key.'</option>';
						}

						foreach ($lga as $lg_key => $lg_value) {
							if($lg_key == $value){ continue; }
							$input .= '<option value="'.$lg_key.'">'.ucfirst($lg_value).'</option>';
						}
					}
				$input .= '</select>';
			}
			elseif(preg_match('/apply/', $key)){
				$input = '<select name="'.$key.'">';
					if($value > 0){
						$input .= '<option value="'.$value.'">'.ucfirst($level[$value]).'</option>';
					}
					else{
						$input .= '<option>'.preg_replace('/\_/', ' ', $key).'</option>';
					}

					foreach ($level as $rec_key => $rec_value) {
						if($rec_key == $value){ continue; }
						$input .= '<option value="'.$rec_key.'">'.ucfirst($rec_value).'</option>';
					}
				$input .= '</select>';
			}
			
			$output .= 	$prev. '<div class="form-control">
				<label style="text-transform: uppercase;">'.$inp.'</label>'
				. $input . $upl.'
			</div>';
		}
	}

	$output .= $table . '<center>
		<button type="reset" name="reset">Reset</button>
		<button type="submit" name="save">Save</button>

		<a href="apply.php?submit">SUBMIT</a>

	</center>';

	$navs = '<div class="recruitment-form-nav">';
	foreach ($forms as $link) {
		$navs .= '<a class="btn" href="apply.php?'.$link.'">'.preg_replace('/[^a-z0-9]/', ' ', $link).'</a>';
	}
	$navs .= '</div>';
	/////////////////////////////
	return $navs .'<form class="recruitment" method="post" enctype="multipart/form-data">'.$output.'</form>';
}
function saveForm($conn, $arr, $uid=0){
	$text=$text2='';$status=0;
	$uid = $uid == 0 ? $_SESSION['user_id'] : $uid;

	$q = "UPDATE recruitment SET ";
	$q2='';
	if(count($_GET) > 0 && array_keys($_GET)[0] == 'secondary_details'){
		$q = "UPDATE secondary_details SET ";
	}

	// var_dump($arr); die;
	foreach ($arr as $key => $value) {
		if($key == 'save') { continue; }

		if(preg_match('/result_secondary_details/', $key)){
			// result_secondary_details
			$qq = $key ."='";
			for($i=1; $i<10; $i++){
				// $qq .= $key2.":".$value2."-";
				$qq .= $_POST[$key]['subject'][$i].":".$_POST[$key]['grade'][$i]."-"; 
			}		

			$q .= preg_replace('/-$/', "', ", $qq);
			// $q .= $qq;
			// echo $_POST[$key]['subject'][1];
			// echo $qq; die;
		}
		elseif(preg_match('/date/', $key)){
			$q .=  $key ."='".(strtotime(sanitize($conn, $value)) > 0 ? strtotime(sanitize($conn, $value)) : 0 )."', ";
		}
		elseif(preg_match('/apply_for/', $key)){
			$q .=  $key ."='".(sanitize($conn, $value) > 0 ?sanitize($conn, $value) : 0 )."', ";
		}
		elseif(!preg_match('/save/', $key)){
			$q .=  $key ."='".sanitize($conn, $value)."', ";
		}
	}

	$files_count=0;
	foreach ($_FILES as $key => $value) {
		$dir = 'uploads/users/recruitment/';
		$fileNew = $uid.'_'.preg_replace('/\_upload/', '', $key).'.png';
		// echo $dir.$fileNew; die;
		if(!empty($_FILES[$key]['tmp_name']))
		{
			$files_count++;
			if(move_uploaded_file($_FILES[$key]['tmp_name'] , $dir.$fileNew)){
				$q2 .=  $key ."='".$fileNew."', ";
			}
			else
			{
				$text2 .= '<em>'.strtoupper(preg_replace('/\_/', ' ', $key)) .'</em> upload failed ';
			}
		}
	}
	
	if($files_count > 0 && !empty($q2)) {
		$q .= $q2;
	}

	$q = preg_replace('/, $/', " WHERE uid='".$uid."';", $q);

	// var_dump($name_secondary_details);
	// echo '<pre>';
	// var_dump($_POST['result_secondary_details']);
	// echo '</pre>';
	// var_dump($_POST);
	// echo $q; die;

	if(empty($text2)){
		if(!$conn->query($q)){
			$text = 'Save failed, try again';
			$text .= $conn->error;
		}
		else{
			$text = 'Saved sucessfully!';
			$status = 1;
		}
	}
	return ['text' => !empty($text2) ? $text2 : $text, 'status' => $status];
}
// CREATE TABLE recruitment(
// 	uid INT (11) NOT NULL,
// 	fname VARCHAR (15) NULL,
// 	mname VARCHAR (15) NULL,
// 	lname VARCHAR (15) NULL,
// 	gender VARCHAR (15) NULL,
// 	dob INT (11) NULL,
// 	address VARCHAR (20) NULL,
// 	lga VARCHAR (15) NULL,
// 	state VARCHAR (15),
// 	address_2 VARCHAR (20) NULL,
// 	lga_2 VARCHAR (15) NULL,
// 	state_2 INT (15) NULL,
// 	country INT (15) NULL,
// 	nin INT (11) NULL,
// 	declaration_upload VARCHAR (30) NULL,
// 	indigene_upload VARCHAR(30) NULL,
// 	nin_upload VARCHAR (30) NULL,
// 	phone VARCHAR (15) NULL,
// 	phone_2 VARCHAR (15) NULL,
// 	name_primary VARCHAR (50) NULL,
// 	name_secondary VARCHAR (50) NULL,
// 	name_tertiary var(50) NULL,
// 	result_primary VARCHAR(15) NULL,
// 	result_secondary VARCHAR(15) NULL,
// 	result_secondary_2 VARCHAR (15) NULL,
// 	result_tertiary VARCHAR (15) NULL,
// 	result_tertiary_2 VARCHAR (15) NULL,
// 	result_primary_upload VARCHAR (30) NULL,
// 	result_secondary_upload VARCHAR (30) NULL,
// 	result_secondary_2_upload VARCHAR (30) NULL,
// 	result_tertiary_upload VARCHAR (30) NULL,
// 	result_tertiary_2_upload VARCHAR (30) NULL,
// 	result_secondary_details VARCHAR (1000) NULL,
// 	result_secondary_2_details VARCHAR (1000) NULL,
// 	result_tertiary VARCHAR (15) NULL,
// 	result_tertiary_2 VARCHAR (15) NULL,
// 	apply_for INT (11) NULL,
// 	apply_date INT (11) NULL,
// 	apply_submit INT (11) NULL,
// 	apply_approve INT (11) DEFAULT 0,
// 	apply_approver INT (11) DEFAULT 0,
// 	apply_approve_date INT (11) DEFAULT 0
		
// );