<?php
include "dbconnect.php";
if(isset($_GET['tech_can_id']))



             
	       
	          $sql = "UPDATE tech_candidates
					

					SET    tech_can_status = 1
					  
					       WHERE                            
					       tech_can_id = '".$_GET['tech_can_id']."'";
		 
					if($conn->query($sql))
						{
							header("Location: HrHomePage.php");
                              exit;
						}
						else {
									                	echo "Error: "  . $sql . "<br>" .$conn->error;
									           			}
?>