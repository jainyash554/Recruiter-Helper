<?php
include "dbconnect.php";
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
	if (isset($_POST['back'])) {
    # code...
   header("Location: HrHomePage.php");
    
     }

     include "Logout.php";




if(isset($_GET['tech_can_id']))
{
	echo $_GET['tech_can_id'];
	//$conn   = new mysqli("localhost", "root", "", "tech_db");
$tech_id = $_GET['tech_can_id'];

   $sql="SELECT a.*, 
b.tech_can_meta_value as training, 
c.tech_can_meta_value as bound, 
d.tech_can_meta_value as court, 
e.tech_can_meta_value as multishift, 
f.tech_can_meta_value as skils, 
g.tech_can_meta_value as currentctc, 
h.tech_can_meta_value as expectedctc, 
i.tech_can_meta_value as hearabout,
j.tech_can_meta_value as totalexp,
k.tech_can_meta_value as noticeperiod FROM 
tech_candidates as a, 
tech_candidate_meta as b, 
tech_candidate_meta as c, 
tech_candidate_meta as d, 
tech_candidate_meta as e, 
tech_candidate_meta as f, 
tech_candidate_meta as g, 
tech_candidate_meta as h, 
tech_candidate_meta as i, 
tech_candidate_meta as j,
tech_candidate_meta as k
where 
a.tech_can_id='$tech_id' AND
a.tech_can_id = b.tech_can_id AND 
a.tech_can_id = c.tech_can_id AND
a.tech_can_id = d.tech_can_id AND 
a.tech_can_id = e.tech_can_id AND 
a.tech_can_id = f.tech_can_id AND 
a.tech_can_id = g.tech_can_id AND 
a.tech_can_id = h.tech_can_id AND 
a.tech_can_id = i.tech_can_id AND 
a.tech_can_id = j.tech_can_id AND
a.tech_can_id = k.tech_can_id AND  
b.tech_can_meta_key = 'traing_period' AND 
c.tech_can_meta_key = 'bond' AND 
d.tech_can_meta_key = 'court_case' AND 
e.tech_can_meta_key = 'multishift' AND 
f.tech_can_meta_key = 'skills' AND 
g.tech_can_meta_key = 'current_ctc' AND 
h.tech_can_meta_key = 'expected_ctc' AND 
i.tech_can_meta_key = 'hear_about_company' AND
j.tech_can_meta_key = 'total_experience' AND
k.tech_can_meta_key = 'notice_period' GROUP BY tech_can_id";
 
 $result = $conn->query($sql);
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {




			 $name=$row['tech_can_fullname'];
			 $email=$row['tech_can_email'];
			 $mobile=$row['tech_can_mobile'];
			 $gender=$row['tech_can_gender'];
			 $qualification=$row['tech_can_qualification'];
			 $maritalstatus=$row['tech_can_maritalstatus'];
			 $appliedposition=$row['tech_can_appliedposition'];
			 $techassign=$row['tech_can_technical_assign'];
			 $date=$row['tech_can_dor'];
			 $hrcomment=$row['tech_can_hr_comment'];
			 $trcomment=$row['tech_can_technical_comment'];
			
			 
			 $totalexp=$row['totalexp'];
			 $training=$row['training'];
			 $bound=$row['bound'];
			 $court=$row['court'];
			 $multishift=$row['multishift'];
			 $skils=$row['skils'];
			 $currentctc=$row['currentctc'];
			 $expectedctc=$row['expectedctc'];
			 $hearabout=$row['hearabout'];
			 $noticeperiod=$row['noticeperiod'];
			
			//$date= date('d/m/Y', strtotime($date));



	}




/////////////////////////////////////////////////////////////////for exp table/////////////////////////////////

   $sql1    = "SELECT GROUP_CONCAT(tech_can_exp_nameofcompany SEPARATOR '& ') as nameofcompany, GROUP_CONCAT(tech_can_exp_designation SEPARATOR '& ') as designatin,GROUP_CONCAT(tech_can_exp_years SEPARATOR '& ') as exprience FROM tech_can_exp where tech_can_exp.tech_can_id= '$tech_id' GROUP BY tech_can_exp.tech_can_id";
    $result = $conn->query($sql1);

    $sql2=" SELECT tech_users_id, tech_users_username FROM tech_users WHERE tech_users_role=2";
     $result1 = $conn->query($sql2);


}
















///////////////////////////////////////////////////update here/////////////////////////


if(isset($_POST['comments']))
{
	$techassign=$_POST['techuser'];
	$techhrcomments=$_POST['comments'];
//$conn   = new mysqli("localhost", "root", "", "tech_db");
	       
	$sql = "UPDATE tech_candidates SET tech_can_hr_comment = '$techhrcomments', tech_can_technical_assign = '$techassign' WHERE                            tech_can_id = '".$_GET['tech_can_id']."'";
	if($conn->query($sql))
	{
		echo "data update successfully";
		header("Location: HrHomePage.php");
		exit();
	}
	else {
				                	echo "Error: "  . $sql . "<br>" .$conn->error;
				           			}
}
//////////////////////////////////////////////////////////////////////////////////////////////



?>


<!DOCTYPE html>
<html>
<head>
	<title>hrupdatecandidateform</title>
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
<body>

<form method="POST" action="">
<div class="col-sm-6"><button type="submit" name="back" value="back">back</button></div>
    </form> 
    <form method="POST" action="">
        <div class="col-sm-6"><button type="submit" name="logout">LogOut</button></div>
    </form>

<form class="form-horizontal" method="POST" action="">
<div class="login_d1">



	<div class="form-group">
	<div class="col-sm-12">
		<h1>Hr Candidate View Form</h1>
	</div>
	</div>
	
   <div class="form-group">
	    <label class="control-label col-sm-4" for="name">Full Name:</label>
	    <div class="col-sm-8">
	      <input type="text" class="form-control" maxlength="32" name="fullname" placeholder="Enter your Full Name" value="<?php echo $name ?>" disabled>
	    </div>
   </div>
   <div class="form-group">
	    <label class="control-label col-sm-4" for="email">Email:</label>
	    <div class="col-sm-8">
	      <input type="email"  class="form-control" name="email" value="<?php echo     $email ?>" placeholder="Enter your Valid Email" disabled> 
	    </div>
   </div>
   <div class="form-group">
	    <label class="control-label col-sm-4" for="mobile">Mobile:</label>
	    <div class="col-sm-8">
	     <input type="text" class="form-control" pattern="[789][0-9]{9}" name="mobile"   value="<?php echo $mobile ?>" placeholder="Enter your Mobile No." disabled>
	    </div>
   </div>
  
   <div class="form-group">
	    <label class="control-label col-sm-4" for="gender">Gender:</label>
	    <div class="col-sm-8 form-inline">
	      <input type="radio" name="gender" class="form-control" disabled value="male" <?php echo ($gender=='male')?'checked':'' ?>> 
		  <label>Male</label>
		  <input type="radio" name="gender" class="form-control" disabled value="female" <?php echo ($gender=='female')?'checked':'' ?>> 							
		  <label>Female</label>
	    </div>
   </div>

    <div class="form-group">
	    <label class="control-label col-sm-4" for="maritalstatus">Marital Status:</label>
	    <div class="col-sm-8 form-inline">
	      <input type="text" class="form-control" value="<?php echo ($maritalstatus=='married')?'Married':'Unmarried' ?>" disabled> 
	    </div>
   </div>


 <div class="form-group">
	    <label class="control-label col-sm-4" for="qualification">Qualification:</label>
	    <div class="col-sm-8">
	     <input type="textarea" class="form-control" name="qualification" value="<?php echo $qualification?>" disabled> 
	    </div>
   </div>



   <div class="form-group">
	    <label class="control-label col-sm-4" for="date">Date of Registration:</label>
	    <div class="col-sm-8">
	      <input type="text" class="form-control" disabled name="date" value="<?php echo date("d/m/Y", strtotime($date))?>" >
	    </div>
   </div>


 <div class="form-group">
	    <label class="control-label col-sm-4" for="positionforapply">Position For Apply:</label>
	    <div class="col-sm-8">
	     <input type="text" class="form-control" name="positionforapply" value="<?php echo $appliedposition?>" disabled> 
	    </div>
   </div>










<div class="col-sm-12"><h1>Exprience Details</h1></div>

			   <table class="table table-striped">
			   <div class="col-sm-12">
						    <thead>
						      <tr>
						        
						        <div class="col-sm-4"><th>Name of Company</th></div>
						        <div class="col-sm-4"><th>Designation</th></div>
						        <div class="col-sm-4"><th>Exprience(Y.M)</th></div>
						      </tr>
						    </thead>
						    
<?php 

						 if (!empty($result)){
							

                        
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        	$i=0;

                        	$nameofcompany=$row['nameofcompany'];
                        	$designatin=$row['designatin'];
                        	$exprience=$row['exprience'];

                        	$nameofcompany = explode("&", $nameofcompany);
                        	$designatin = explode("&", $designatin);
                        	$exprience = explode("& ", $exprience);
                        	while(!empty($nameofcompany[$i])&&!empty($designatin[$i])&&!empty($exprience[$i]))
                        	{
                        		?>




						    <tbody>
						      <tr>
						        <div class="col-sm-4"><td><input type="text" disabled name="companyname1" value="<?php echo $nameofcompany[$i] ?>"></td></div>
						        <div class="col-sm-4"><td><input type="text" disabled name="designation1" value="<?php echo $designatin[$i] ?>" ></td></div>
						        <div class="col-sm-4"><td><input type="number" disabled name="exprience1" value="<?php echo $exprience[$i] ?>" ></td></div>
						      </tr>
						  
						    </tbody>
<?php
						  $i++;  }
						    
}
}

?>						
</div>    
				</table>
		</div>


	<!-- 	<div class="form-group">
							    <label class="control-label col-sm-4" for="noticeperiod">Notice Period:</label>
							    	<div class="col-sm-2">
								        <select class="form-control" name="noticeperiod" required>
										    <option value="1">Days</option>
										    <option value="2">Month</option>
										 </select>
					    			</div>

								    <div class="col-sm-4">
								     <input type="number" class="form-control" name="noticevalue" placeholder="Notice Priode" required> 
								    </div>
						   </div> -->



 <div class="form-group">
				    <label class="control-label col-sm-5" for="trainnig">Training For 1 to 10 Months:</label>
				    <div class="col-sm-3">
				    <input type="text" name="training" class="form-control" disabled value="<?php echo ($training=='yes')?'YES':'NO' ?>">
				    </div>
			   </div>



              <div class="form-group">
				    <label class="control-label col-sm-5" for="bond">Minimum Period of Working:</label>
				    <div class="col-sm-3">
				    <input type="text" name="bound" class="form-control" disabled value="<?php echo ($bound=='yes')?'YES':'NO' ?>">
				    </div>
			   </div>
			   <div class="form-group">
				    <label class="control-label col-sm-5" for="court">Court of Law:</label>
				    <div class="col-sm-3">
				     <input type="text" name="court"  disabled class="form-control" value="<?php echo ($court=='1')?'YES':'NO' ?>">
			   </div>



                  <div class="form-group">
				    <label class="control-label col-sm-5" for="multishift">Multishifts:</label>
				    <div class="col-sm-3">
				    <input type="text" name="multishift" class="form-control" disabled value="<?php echo ($multishift=='1')?'YES':'NO' ?>">
				    </div>
				    </div>



             <div class="form-group">
				    <label class="control-label col-sm-5" for="skills">Skills:</label>
				    <div class="col-sm-3">
				    <textarea disabled value="hello" name="skills"><?php echo $skils ?>
				    </textarea>
				    </div>
			   </div>






			   <div class="form-group">
				    <label class="control-label col-sm-5" for="currentctc">Current CTC:</label>
				    <div class="col-sm-3">
				     <input type="number" name="currentctc" value="<?php echo $currentctc?>" disabled>
				    </div>
			   </div>
			   <div class="form-group">
				    <label class="control-label col-sm-5" for="expectedctc">Expected CTC:</label>
				    <div class="col-sm-3">
				     <input type="number" name="expectedctc" value="<?php echo $expectedctc?>" disabled>
				    </div>
			   </div>
			    <div class="form-group">
				    <label class="control-label col-sm-5" for="hearaboutcompany">Hear About Company:</label>
				    <div class="col-sm-7">
				    <input type="textarea" name="expectedctc" value="<?php echo $hearabout?>" disabled></div>
				    </div>
			   </div>
			    <div class="form-group">
				    <label class="control-label col-sm-5" for="skills">Tr-Comments:</label>
				    <div class="col-sm-3">
				    <textarea disabled name="comments"><?php echo $trcomment; ?>
				    </textarea>
				    </div>
			   </div>

                  <div class="form-group">
				    <label class="control-label col-sm-5" for="multishift">Technical Assign:</label>
				    <div class="col-sm-3">
				     <select class="form-control" name="techuser" required>

                  <?php 

						 if (!empty($result1)){
							

                        
                        while ($row = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
                        	$i=0;

                        	$tech_users_id=$row['tech_users_id'];
                        	$tech_users_username=$row['tech_users_username'];
                        	
                        		?>


			   
						    <option value="<?php echo $tech_users_id; ?>"><?php echo $tech_users_username; ?></option>
						    
						 

<?php } }?>			
					 </select>
				    </div>
			   </div>

			  <div class="form-group">
				    <label class="control-label col-sm-5" for="skills">Comments:</label>
				    <div class="col-sm-3">
				    <textarea  name="comments">
				    </textarea>
				    </div>
			   </div>
			
<div class="col-sm-12">  <button type="submit" name="submit" class="btn btn-default">Update</button></div>

  
</div></form>




</body></html> 
<?php ob_end_flush(); ?>