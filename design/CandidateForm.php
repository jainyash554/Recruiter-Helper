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


	if (isset($_POST['list'])) {
    # code...
   header("Location: BasicUserHome.php");
    
     }
?>
<?php include 'CandidateForm.html';?>

<?php include 'Logout.php';?>


		<?php include "dbconnect.php";?>

<?php ob_end_flush(); ?>
