<?php
session_start();

ob_start();
if(isset($_SESSION['usr3'])!="")
    {
    
    }
    else{
        session_unset();
       session_destroy();
       header("Location: LogIn.php");
    exit;
    }
   /* if (isset($_POST['back'])) {
    # code...
   header("Location: HrHomePage.php");
    
     }*/

     include "Logout.php";
     include "dbconnect.php";
 
?>

<?php



//$conn   = new mysqli("localhost", "root", "", "tech_db");
$sql    = "SELECT tc.tech_can_id, tc.tech_can_fullname, tc.tech_can_email, tc.tech_can_mobile,tc.tech_can_technical_assign, tc.tech_can_gender, tc.tech_can_appliedposition, tc.tech_can_dor, tc.tech_can_technical_assign, SUM(tce.tech_can_exp_years) as totalexp FROM tech_candidates tc INNER JOIN tech_can_exp tce ON tc.tech_can_id = tce.tech_can_id WHERE tc.tech_can_status=0 GROUP BY tc.tech_can_id";
    $result = $conn->query($sql);

echo "<h1>TrCandidateList</h1>";
?>




<!DOCTYPE html>
<html>
<head>
    <title>TrCandidateList</title>
</head>
<body>







<?php
 if (!empty($result)){

                        $i=1;
                        
                        echo "<table border='1px'>   
                                    <thead>   
                                        <tr>   
                                            <th> S.No. </th>   
                                            <th> Name </th>
                                            <th> Email </th>     
                                            <th> Mobile </th>   
                                            <th> Gender </th>
                                            <th> Position For Apply </th>   
                                            <th> Date of Registration </th> 
                                            <th> Total Exprience </th>
                                            
                                            <th colspan=3> Action </th>   
                                        </tr>";
                        // output data of each row
                        //while($row = $result->fetch_assoc()) {
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                          /* $date=date('m/d/Y',$row['tech_can_dor']);*/
                          $id=$row['tech_can_id'];
                            echo "<form method='POST',action=''>";
                            echo "<tr>";
                            echo "<td>" . $i++. "</td>";
                            echo "<td>" . $row['tech_can_fullname'] . "</td>";
                            echo "<td>" . $row['tech_can_email'] . "</td>";
                            echo "<td>" . $row['tech_can_mobile'] . "</td>";
                            echo "<td>" . $row['tech_can_gender'] . "</td>";
                            echo "<td>" . $row['tech_can_appliedposition'] . "</td>";
                            echo "<td>" . date("d/m/Y", strtotime($row['tech_can_dor'])) . "</td>";
                            echo "<td>" . $row['totalexp'] . "</td>";
                          
                            if($_SESSION['tech_users_id']==$row['tech_can_technical_assign']){
                            echo "<td>" ." <a href='TrCandidateViewForm.php?tech_can_id=$id'>View</a> 
                                            " . "</td>";
                                        }
                            echo "</tr>";
                            echo "</form>";
                        }
                        echo "</table>";
                       
                                                      }
                              else {
                                    echo "Error: "  . $sql . "<br>" .$conn->error;
                                    }
?> 
<form method="POST" action="">
        <div class="col-sm-3"><button type="submit" name="logout">LogOut</button></div>
    </form> 
</body>
</html>

<?php ob_end_flush()?>