<?php
session_start();
ob_start();
if(isset($_SESSION['usr1'])!="")
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
	<title>candidatehome</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
     <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
	<script type="text/javascript" src="test.js"></script>
	<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">

	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="../js/bootstrap.js">
	<link rel="stylesheet" type="text/css" href="../js/bootstrap.min.js">
	<link rel="stylesheet" type="text/css" href="../js/npm.js">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript">
	$(document).ready(function(){


	////////////////////////////////////basic user home///////////////////////////////////////////



					$("#basicadd").click(function()
					{
						$.ajax({
							url : "CandidateForm.php",
							success : function(data)
							{
								$("#bodycontent").html(data);
															}
						});
				     });
					$("#basiclist").click(function()
					{
						$.ajax({
							url : "BasicCandidateList.php",
							success : function(data)
							{
								$("#bodycontent").html(data);
															}
						});
				     });
				});
	</script>
</head>
<body>
<div class="body">
	<div class="col-sm-12 header">
		<div class="col-sm-3"><button name="add" id="basicadd" value="add">ADD</button></div>
	
		<div class="col-sm-3"><button type="submit" name="list" value="list" id="basiclist">LIST</button></div>
	
	<form method="POST" action="">
		<div class="col-sm-3"><button type="submit" name="logout">LogOut</button></div>
	</form>	
	</div>
			<div>
				<?php
			/*if (isset($_POST['add'])) {
				# code...
				header("Location: CandidateForm.php");
			die();

				
			}*/
			if (isset($_POST['list'])) {
				# code...
			header("Location: BasicCandidateList.php");
				
			}
			include "Logout.php";

			?>
			<?php ob_end_flush(); ?>

			</div>
			<div id="bodycontent">
				
			</div>
</div>
</body>
</html>