<?php
session_start();
ob_start();
if(isset($_SESSION['usr2'])!="")
	{
	
	}
	else{
		session_unset();
       session_destroy();
       header("Location: LogIn.php");
	exit;
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>hrcandidateform</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="../js/bootstrap.js">
	<link rel="stylesheet" type="text/css" href="../js/bootstrap.min.js">
	<link rel="stylesheet" type="text/css" href="../js/npm.js">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="body">

	<div class="col-sm-12 header">
	
	<form method="POST" action="">
		<div class="col-sm-3"><button type="submit" name="list" value="list">LIST</button></div>
	</form>	
	<form method="POST" action="">
		<div class="col-sm-3"><button type="submit" name="reject" value="reject">RejectedCandidateList</button></div>
	</form>
	<form method="POST" action="">
		<div class="col-sm-3"><button type="submit" name="logout">LogOut</button></div>
	</form>	
	</div>
<div>
	<?php
if (isset($_POST['reject'])) {
	# code...
	header("Location: RejectedCandidate.php");
die();

	
}
if (isset($_POST['list'])) {
	# code...
header("Location: HrCandidateList.php");
	
}
include "Logout.php";

?>
<?php ob_end_flush(); ?>

</div>
</body>
</html>