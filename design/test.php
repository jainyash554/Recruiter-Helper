<?php
//session_start();
       # code...

    





$conn   = new mysqli("localhost", "root", "", "tech_db");
$sql    = "SELECT tc.tech_can_id, tc.tech_can_fullname, tc.tech_can_email, tc.tech_can_mobile, tc.tech_can_gender, tc.tech_can_appliedposition, tc.tech_can_dor, tc.tech_can_technical_assign, SUM(tce.tech_can_exp_years) as totalexp FROM tech_candidates tc INNER JOIN tech_can_exp tce ON tc.tech_can_id = tce.tech_can_id GROUP BY tc.tech_can_id";
    $result = $conn->query($sql);


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
                                            <th> Assign_Details </th>   
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
                            echo "<td>" . $row['totalexp'] . "</td>";
                            echo "<td>" . $row['tech_can_dor'] . "</td>";
                            echo "<td>" . $row['tech_can_technical_assign'] . "</td>";
                            echo "<td>" ." <a href='BasicUpdateForm.php?tech_can_id=$id'>View</a> 
                                            <a href='BasicUpdateForm.php?tech_can_id=$id'>Update</a>
                                            <a href='BasicUpdateForm.php?tech_can_id=$id'>Reject</a>" . "</td>";
                            echo "</tr>";
                            echo "</form>";
                        }
                        echo "</table>";
                        echo "<br>New record created successfully in table<br>";
                                                      }
                              else {
                                    echo "Error: "  . $sql . "<br>" .$conn->error;
                                    }
?> 