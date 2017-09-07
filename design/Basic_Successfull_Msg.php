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


	if (isset($_POST['back'])) {
    # code...
   header("Location: BasicUserHome.php");
    
     }
?>
<!DOCTYPE html>
<html>
<head>
	<title>successmsg</title>
</head>
<body>
<h1>DataSuccessfully Submited..</h1>
<form method="POST" action="">
<div class="form-group">
        <div class="col-sm-12"><button type="submit" name="back" value="back">Back</button></div>
   
</div>
 </form> 

</body>
</html>
<?php ob_end_flush(); ?>