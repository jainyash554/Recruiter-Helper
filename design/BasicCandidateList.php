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
     include "Logout.php";
     include "dbconnect.php";

?>
















<!DOCTYPE html>
<html>
<head>
    <title>candidateform</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="../js/bootstrap.js">
    <link rel="stylesheet" type="text/css" href="../js/bootstrap.min.js">
    <link rel="stylesheet" type="text/css" href="../js/npm.js">
    <link rel="stylesheet" type="text/css" href="style.css">


    <script>
    $(document).ready(function(){


    ////////////////////////////////////basic user home///////////////////////////////////////////



                    $("button").click(function()
                    {
                        alert('hii');
                       /* $.ajax({
                            url : "BasicUpdateForm.php",
                            success : function(data)
                            {
                                $("#bodycontent").html(data);
                                                            }
                        });
                
                     });*/
                });
                </script>
</head>
<body>




<div class="container">
<div class="col-sm-12">
<div class="col-sm-12"><h2>Candidates List</h2></div><br><br>
<div class="col-sm-12"></div>
<div class="col-sm-12"></div>
<!-- <form method="POST" action="">
        <div class="col-sm-6"><button type="submit" name="list" value="list">Back</button></div>
    </form> 
    <form method="POST" action="">
        <div class="col-sm-6"><button type="submit" name="logout">LogOut</button></div>
    </form>
    <div class="col-sm-12"></div>
<div class="col-sm-12"></div><br><br>
 -->
<?php





//$conn   = new mysqli("localhost", "root", "", "tech_db");
$sql    = "SELECT tech_can_id, tech_can_fullname, tech_can_email,tech_can_mobile, tech_can_gender, tech_can_dor FROM tech_candidates ";
$result = $conn->query($sql);
$i=1;

echo "<table border='1px'>   
            <thead>   
                <tr>   
                    <th> <div class='col-sm-1'>S.No. </div>   </th>
                    <th><div class='col-sm-2'> Name </div></th>
                    <th><div class='col-sm-2'> Email </div> </th>    
                    <th><div class='col-sm-2'> Mobile </div> </th>  
                    <th><div class='col-sm-1'> Gender </div></th>   
                    <th><div class='col-sm-2'> Date of Registration </div></th>   
                    <th><div class='col-sm-2'> Action </div></th>   
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
    echo "<td>" . date("d/m/Y", strtotime($row['tech_can_dor'])) . "</td>";
    echo "<td>" ." <button>edit</button>" . "</td>";
    echo "</tr>";
    echo "</form>";
}
echo "</table>";
echo "</div>";

?> 
    

</div>
</div>
</body>
</html>
<?php ob_end_flush(); ?>
