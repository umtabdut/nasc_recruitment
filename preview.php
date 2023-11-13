<?php include 'inc/init.php'; 
// error_reporting(0);
// header("Content-Type: application/pdf");

  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Preview Application</title>
	 <link rel="stylesheet" type="text/css" href="styles/applicant.css">
</head>
<body>
	 <?php


if(isset($_GET['id'])) {
	$id = sanitize($conn, $_GET['id']);
	
	// echo '<pre>';
	// var_dump($_SESSION['res']['applicants'][$id]) ;
	if(!empty($id)){
		showApplication($conn, $_SESSION['res']['applicants'][$id]);
	}
}
?>
</body>
</html>