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

     include "Logout.php";
     include "dbconnect.php";










if(isset($_GET['tech_can_id']))
{
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
e.tech_can_meta_key = 'multiShift' AND 
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

   $sql1    = "SELECT GROUP_CONCAT(tech_can_exp_id SEPARATOR '& ') as expid, GROUP_CONCAT(tech_can_exp_nameofcompany SEPARATOR '& ') as nameofcompany, GROUP_CONCAT(tech_can_exp_designation SEPARATOR '& ') as designatin,GROUP_CONCAT(tech_can_exp_years SEPARATOR '& ') as exprience FROM tech_can_exp where tech_can_exp.tech_can_id= '$tech_id' GROUP BY tech_can_exp.tech_can_id";
    $result = $conn->query($sql1);




}
















///////////////////////////////////////////////////update here/////////////////////////


if(isset($_POST['fullname']))
{

	                        $name=$_POST['fullname'];
							$email=$_POST['email'];
							$mobile=$_POST['mobile'];
							$gender=$_POST['gender'] ;                      
							$qualification=$_POST['qualification'];
							$positionforapply=$_POST['positionforapply'];
							$maritalstatus=$_POST['maritalstatus'];
							$date=$date;
							$expid=isset($_POST['expid']);
							$companyname=isset($_POST['companyname']);
							$designation=isset($_POST['designatin']);
							$exprience=isset($_POST['exprience']);
							
							$training=$_POST['training'];
							$bound=$_POST['bound'];
							$court=$_POST['court'];
							$multishift=$_POST['multishift'];
							$skill=$_POST['skills'];							
							$currentctc=$_POST['currentctc'];
							$expectedctc=$_POST['expectedctc'];
						    $hearabout=$_POST['hearabout'];


							


          $tablemeta=["total_experience"=>"$totalexp","traing_period"=>"$training","bond"=>"$bound","court_case"=>"$court","multiShift"=>"$multishift","skills"=>"$skill","current_ctc"=>"$currentctc","expected_ctc"=>"$expectedctc",        "hear_about_company"=>"$hearabout","notice_period"=>"$noticeperiod"];

             //$conn   = new mysqli("localhost", "root", "", "tech_db");
	       
	          $sql = "UPDATE tech_candidates
					

					SET    tech_can_fullname = '$name', 
					       tech_can_email = '$email',
					       tech_can_mobile = '$mobile',  
					       tech_can_gender = '$gender', 
					       tech_can_qualification='$qualification',
					       tech_can_maritalstatus='$maritalstatus',
					       tech_can_dor = '$date'
					     
					       WHERE                            
					       tech_can_id = '".$_GET['tech_can_id']."'";
		 
					if($conn->query($sql))
						{
							echo "data update successfully";
						}
						else {
									                	echo "Error: "  . $sql . "<br>" .$conn->error;
									           			}
		
				
				foreach ($tablemeta as $key => $value) {
					
						$sql1 = 
				"UPDATE tech_candidate_meta SET tech_can_meta_value='".$value."' WHERE tech_can_meta_key='".$key."' AND tech_can_id = '".$_GET['tech_can_id']."'";
				$conn->query($sql1);
				
				}

						$x=0;
						while (!empty($companyname[$x])) {
							# code...
							echo $companyname[$x];
						
					$sql3 = 
							"UPDATE tech_can_exp SET tech_can_exp_nameofcompany='".$companyname[$x]."',
						 tech_can_exp_designation='".$designation[$x]."',
						 tech_can_exp_years='".$exprience[$x]."'
						 WHERE tech_can_exp_id='".$expid[$x]."'";
						
						 if($conn->query($sql3))
							{
								 $x++;
								
							}
							else {
				                	echo "Error: "  . $sql3 . "<br>" .$conn->error;
				           			}
				           			
						
 						}

}



?>


<!DOCTYPE html>
<html>
<head>
	<title>BasicCandidateForm</title>
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
		<h1>Basic Candidate Updation Form</h1>
	</div>
	</div>
	
   <div class="form-group">
	    <label class="control-label col-sm-4" for="name">Full Name:</label>
	    <div class="col-sm-8">
	      <input type="text" class="form-control" maxlength="32" name="fullname" placeholder="Enter your Full Name" value="<?php echo $name ?>" >
	    </div>
   </div>
   <div class="form-group">
	    <label class="control-label col-sm-4" for="email">Email:</label>
	    <div class="col-sm-8">
	      <input type="email"  class="form-control" name="email" value="<?php echo     $email ?>" placeholder="Enter your Valid Email" > 
	    </div>
   </div>
   <div class="form-group">
	    <label class="control-label col-sm-4" for="mobile">Mobile:</label>
	    <div class="col-sm-8">
	     <input type="text" class="form-control" pattern="[789][0-9]{9}" name="mobile"   value="<?php echo $mobile ?>" placeholder="Enter your Mobile No." >
	    </div>
   </div>
  
   <div class="form-group">
	    <label class="control-label col-sm-4" for="gender">Gender:</label>
	    <div class="col-sm-8 form-inline">
	      <input type="radio" name="gender" class="form-control"  value="male" <?php echo ($gender=='male')?'checked':'' ?>> 
		  <label>Male</label>
		  <input type="radio" name="gender" class="form-control"  value="female" <?php echo ($gender=='female')?'checked':'' ?>> 							
		  <label>Female</label>
	    </div>
   </div>

    <div class="form-group">
	    <label class="control-label col-sm-4" for="maritalstatus">Marital Status:</label>
	    <div class="col-sm-8 form-inline">
	      <input type="text" class="form-control" name="maritalstatus" value="<?php echo ($maritalstatus=='married')?'Married':'Unmarried' ?>" > 
	    </div>
   </div>


 <div class="form-group">
	    <label class="control-label col-sm-4" for="qualification">Qualification:</label>
	    <div class="col-sm-8">
	     <input type="textarea" class="form-control" name="qualification" value="<?php echo $qualification?>" > 
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
	     <input type="text" class="form-control" name="positionforapply" value="<?php echo $appliedposition?>" > 
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
                        	$expid=$row['expid'];
                        	$nameofcompany=$row['nameofcompany'];
                        	$designatin=$row['designatin'];
                        	$exprience=$row['exprience'];
                        	
                        	$expid = explode("& ", $expid);

                        	$nameofcompany = explode("& ", $nameofcompany);
                        	$designatin = explode("& ", $designatin);
                        	$exprience = explode("& ", $exprience);
                        	



                        	while(!empty($nameofcompany[$i])&&!empty($designatin[$i]))
                        	{
                        		?>




						    <tbody>
						      <tr>
						      <input type="hidden" value="<?php echo $expid[$i] ?>" name="expid[]" />
						        <div class="col-sm-4"><td><input type="text"  name="companyname[]" value="<?php echo $nameofcompany[$i] ?>"></td></div>
						        <div class="col-sm-4"><td><input type="text"  name="designatin[]" value="<?php echo $designatin[$i] ?>" ></td></div>
						        <div class="col-sm-4"><td><input type="number" step="any" name="exprience[]" value="<?php echo $exprience[$i]; ?>" ></td></div>
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


		<!-- <div class="form-group">
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
						   </div>
 -->


 <div class="form-group">
				    <label class="control-label col-sm-5" for="trainnig">Training For 1 to 10 Months:</label>
				    <div class="col-sm-3">
				     <select class="form-control" name="training" >
						   <?php if($training=='yes'){ ?>
						   <option value="yes">YES</option>
						    <option value="no">NO</option>
						    <?php } ?>
						     <?php if($training=='no'){ ?>
						   <option value="no">NO</option>
						    <option value="yes">YES</option>
						    <?php } ?>
						  </select>
				    </div>
			   </div>
			   


              <div class="form-group">
				    <label class="control-label col-sm-5" for="bond">Minimum Period of Working:</label>
				    <div class="col-sm-3">
				    <select class="form-control" name="bound" required >
				    <?php if($bound=='yes'){ ?>
						   <option value="yes">YES</option>
						    <option value="no">NO</option>
						    <?php } ?>
						     <?php if($bound=='no'){ ?>
						   <option value="no">NO</option>
						    <option value="yes">YES</option>
						    <?php } ?>
						  </select>
				    </div>
			   </div>
			   
			    <div class="form-group">
				    <label class="control-label col-sm-5" for="court">Court of Law::</label>
				    <div class="col-sm-3">
				     <select class="form-control" name="court" required >						   
						    <?php if($court=='yes'){ ?>
						   <option value="yes">YES</option>
						    <option value="no">NO</option>
						    <?php } ?>
						     <?php if($court=='no'){ ?>
						   <option value="no">NO</option>
						    <option value="yes">YES</option>
						    <?php } ?>
						  </select>
				    </div>
				    </div>

                  <div class="form-group">
				    <label class="control-label col-sm-5" for="multishift">Multishifts:</label>
				    <div class="col-sm-3">
				     <select class="form-control" name="multishift" required >						   
						   <?php if($multishift=='yes'){ ?>
						   <option value="yes">YES</option>
						    <option value="no">NO</option>
						    <?php } ?>
						     <?php if($multishift=='no'){ ?>
						   <option value="no">NO</option>
						    <option value="yes">YES</option>
						    <?php } ?>
						  </select>
				    </div>
				    </div>



             <div class="form-group">
				    <label class="control-label col-sm-5" for="skills">Skills:</label>
				    <div class="col-sm-3">
				    <textarea  value="hello" name="skills"><?php echo $skils ?>
				    </textarea>
				    </div>
			   </div>






			   <div class="form-group">
				    <label class="control-label col-sm-5" for="currentctc">Current CTC:</label>
				    <div class="col-sm-3">
				     <input type="number" name="currentctc" value="<?php echo $currentctc?>" >
				    </div>
			   </div>
			   <div class="form-group">
				    <label class="control-label col-sm-5" for="expectedctc">Expected CTC:</label>
				    <div class="col-sm-3">
				     <input type="number" name="expectedctc" value="<?php echo $expectedctc?>" >
				    </div>
			   </div>
			    <div class="form-group">
				    <label class="control-label col-sm-5" for="hearaboutcompany">Hear About Company:</label>
				    <div class="col-sm-7">
				    <input type="textarea" name="hearabout" value="<?php echo $hearabout?>" ></div>
				    </div>
			   </div>


			 
			
<div class="col-sm-12">  <button type="submit" name="submit" class="btn btn-default">Update</button></div>

  
</div></form>


</body></html> 
<?php ob_end_flush(); ?>