<?php

include "dbconnect.php";
$last_id;
$tech_can_exp_year;

if(isset($_POST['email']))
{

     $sql    = "SELECT tech_can_email FROM tech_candidates";
     $result = $conn->query($sql);
     while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				     	if($_POST['email']==$row['tech_can_email']){
				     		echo "email already exist...";
     	
    die();
				}
		}
}



/*function tech_candidate_tb_add($tech_can_fullname,
								$tech_can_email,
								$tech_can_mobile,
								$tech_can_gender,                             
								$tech_can_qualification,
								$tech_can_appliedposition,
								$tech_can_maritalstatus,
								$tech_can_dor,
								$tech_can_exp_nameofcompany1,         
								$tech_can_exp_designation1,
								$tech_can_exp_years1,
								$tech_can_exp_nameofcompany2,         
								$tech_can_exp_designation2,
								$tech_can_exp_years2,
								$tech_can_exp_nameofcompany3,         
								$tech_can_exp_designation3,
								$tech_can_exp_years3,
								$tech_can_training,
								$tech_can_bond,
								$tech_can_court,
								$tech_can_multishifts,
								$tech_can_skills,
								$tech_can_currentctc,
								$tech_can_expectedctc,
								$tech_can_hearabout,
								$noticeperiod                       /*$tech_can_technical_assign,$tech_can_technical_comment,$tech_can_hr_comment,$tech_can_status*///)

if(isset($_POST['mobile']))
{


$tech_can_dor=$_POST['date'];                                         
$tech_can_fullname=$_POST['name'];
$tech_can_email=$_POST['email'];
$tech_can_mobile=$_POST['mobile'];
$tech_can_gender=$_POST['gender'];
$tech_can_qualification=$_POST['qualification'];
$tech_can_appliedposition=$_POST['positionforapply'];
$tech_can_maritalstatus=$_POST['maritalstatus'];
$tech_can_exp_nameofcompany1=$_POST['companyname1'];
$tech_can_exp_years1=$_POST['exprience1'];
$tech_can_exp_designation1=$_POST['designation1'];
$tech_can_exp_nameofcompany2=$_POST['companyname2'];
$tech_can_exp_years2=$_POST['exprience2'];
$tech_can_exp_designation2=$_POST['designation2'];
$tech_can_exp_nameofcompany3=$_POST['companyname3'];
$tech_can_exp_years3=$_POST['exprience3'];
$tech_can_exp_designation3=$_POST['designation3'];
$noticeperiod =$_POST['noticeperiod'];
$tech_can_training=$_POST['training'];
$tech_can_bond=$_POST['bond'];
$tech_can_court=$_POST['court'];
$tech_can_multishifts=$_POST['multishift'];
$tech_can_skills=$_POST['skills'];
$tech_can_currentctc=$_POST['currentctc'];
$tech_can_expectedctc=$_POST['expectedctc'];
$tech_can_hearabout=$_POST['checkbox'];


	
	/*$tech_can_dor=strtotime($tech_can_dor);*/


	$sql = "INSERT INTO tech_candidates(tech_can_fullname, 
									tech_can_email, 
									tech_can_mobile, 
									tech_can_gender, 
									tech_can_qualification, 
									tech_can_appliedposition, 
									tech_can_maritalstatus, 
									tech_can_dor)   
		          			 VALUES ( '$tech_can_fullname',
		          			 			'$tech_can_email', 
		          			 			'$tech_can_mobile', 
		          			 			'$tech_can_gender',     
		          			 			'$tech_can_qualification', 
		          			 			'$tech_can_appliedposition', 
		          			 			'$tech_can_maritalstatus', 
		          			 			'$tech_can_dor'                     
		          			 			)";
		          			 			include "dbconnect.php";
		          if ($conn->query($sql) === TRUE) {
          			 			
          			 			 $last_id = mysqli_insert_id($conn);
		          			 if(!empty($tech_can_exp_nameofcompany1)&&
		          			 	 empty($tech_can_exp_nameofcompany2)&&
		          			 	 empty($tech_can_exp_nameofcompany3))
		          		{

		          			 	$sql1="INSERT INTO tech_can_exp(
		          			 				tech_can_id, 
											tech_can_exp_nameofcompany,         
											tech_can_exp_designation,
											tech_can_exp_years)   
				          			 VALUES ( 	
				          			 			'$last_id',
				          			 			'$tech_can_exp_nameofcompany1',         
												'$tech_can_exp_designation1',
												'$tech_can_exp_years1'                     
				          			 			)";
				          			 
				          	 if ($conn->query($sql1) === FALSE){
		                			echo "Error: "  . $sql1 . "<br>" .$conn->error;
		          			  }
		          			  
		                } 


		                if(!empty($tech_can_exp_nameofcompany1)&&
		          			 	 !empty($tech_can_exp_nameofcompany2)&&
		          			 	 empty($tech_can_exp_nameofcompany3))
		          		{

		          			 	$sql1="INSERT INTO tech_can_exp(
		          			 				tech_can_id, 
											tech_can_exp_nameofcompany,         
											tech_can_exp_designation,
											tech_can_exp_years)   
				          			 VALUES ( 	
				          			 			'$last_id',
				          			 			'$tech_can_exp_nameofcompany1',         
												'$tech_can_exp_designation1',
												'$tech_can_exp_years1'                     
				          			 			),
				          			 			( 	
				          			 			'$last_id',
				          			 			'$tech_can_exp_nameofcompany2',         
												'$tech_can_exp_designation2',
												'$tech_can_exp_years2'                     
				          			 			)";
				          			 
				          	 if ($conn->query($sql1) === FALSE){
		                			echo "Error: "  . $sql1 . "<br>" .$conn->error;
		          			  }
		                }





		                if(!empty($tech_can_exp_nameofcompany1)&&
		          			 	 !empty($tech_can_exp_nameofcompany2)&&
		          			 	 !empty($tech_can_exp_nameofcompany3))
		          		{

		          			 	$sql1="INSERT INTO tech_can_exp(
		          			 				tech_can_id, 
											tech_can_exp_nameofcompany,         
											tech_can_exp_designation,
											tech_can_exp_years)   
				          			 VALUES ( 	
				          			 			'$last_id',
				          			 			'$tech_can_exp_nameofcompany1',         
												'$tech_can_exp_designation1',
												'$tech_can_exp_years1'                     
				          			 			),
				          			 			( 	
				          			 			'$last_id',
				          			 			'$tech_can_exp_nameofcompany2',         
												'$tech_can_exp_designation2',
												'$tech_can_exp_years2'                     
				          			 			),
				          			 			( 	
				          			 			'$last_id',
				          			 			'$tech_can_exp_nameofcompany3',         
												'$tech_can_exp_designation3',
												'$tech_can_exp_years3'                     
				          			 			)";
				          			 
				          	 if ($conn->query($sql1) === FALSE){
		                			echo "Error: "  . $sql1 . "<br>" .$conn->error;
		          			  }
		                }



		                ///////////////////////////////////////////////////////////////////////////////


								$sql4 = "SELECT SUM(tech_can_exp_years) AS sum FROM tech_can_exp WHERE tech_can_id=$last_id";
								$result=$conn->query($sql4);
								
								if ($result->num_rows > 0) {
							    // output data of each row
							    while($row = $result->fetch_assoc()) {
							        $tech_can_exp_year=$row["sum"];
							    }	
							    }



		                $sql3="INSERT INTO tech_candidate_meta(
		          			 				tech_can_id, 
											tech_can_meta_key,         
											tech_can_meta_value
											)   
				          			 VALUES ( 	
				          			 			'$last_id',
				          			 			'total_experience',         
												'$tech_can_exp_year'                     
				          			 			),
				          			 			( 	
				          			 			'$last_id',
				          			 			'notice_period',         
												'$noticeperiod'                     
				          			 			),
				          			 			( 	
				          			 			'$last_id',
				          			 			'traing_period',         
												'$tech_can_training'                     
				          			 			),
				          			 			( 	
				          			 			'$last_id',
				          			 			'bond',         
												'$tech_can_bond'                     
				          			 			),
				          			 			( 	
				          			 			'$last_id',
				          			 			'court_case',         
												'$tech_can_court'                     
				          			 			),
				          			 			( 	
				          			 			'$last_id',
				          			 			'multishift',         
												'$tech_can_multishifts'                     
				          			 			),
				          			 			( 	
				          			 			'$last_id',
				          			 			'skills',         
												'$tech_can_skills'                     
				          			 			),
				          			 			( 	
				          			 			'$last_id',
				          			 			'current_ctc',         
												'$tech_can_currentctc'                     
				          			 			),
				          			 			( 	
				          			 			'$last_id',
				          			 			'expected_ctc',         
												'$tech_can_expectedctc'                     
				          			 			),
				          			 			( 	
				          			 			'$last_id',
				          			 			'hear_about_company',         
												'$tech_can_hearabout'                     
				          			 			)";

				          			 if ($conn->query($sql3) === TRUE){
		                	echo "Successfully Data Submited...";
		          			  }
		          			  else {
				                	echo "Error: "  . $sql1 . "<br>" .$conn->error;
				           			}

							


		        }  
		           else {
                	echo "Error: "  . $sql1 . "<br>" . $sql."<br>".$conn->error;
           			 }

          		
}






?>