

<?php
session_start();

if(isset($_SESSION['usr1'])!="")
	{
		header("Location: BasicUserHome.php");
		exit;
	}
    if(isset($_SESSION['usr2'])!="")
    {
        header("Location: HrHomePage.php");
        exit;
    }
    if(isset($_SESSION['usr3'])!="")
    {
        header("Location: TrCandidateList.php");
        exit;
    }

    
include "dbconnect.php";


$errors = array();



#########################################################################################
if (isset($_POST['username'])) {
    $sql  = "SELECT tech_users_username, tech_users_password, tech_users_role, tech_users_id FROM tech_users";
    $auth = $conn->query($sql);
    if ($auth->num_rows > 0) {
        while ($row = $auth->fetch_assoc()) {

            if ($row['tech_users_username'] == $_POST['username'] && $row['tech_users_password'] == $_POST['password']                && $row['tech_users_role'] == 0) {
            	$_SESSION['usr1'] = $row['tech_users_username'];
			    $_SESSION['pw']  = $row['tech_users_password'];
			    $_SESSION['role']  = $row['tech_users_role'];
                header('Location: BasicUserHome.php');
                exit();
            }
            if ($row['tech_users_username'] == $_POST['username'] && $row['tech_users_password'] == $_POST['password']                && $row['tech_users_role'] == 1) {
                $_SESSION['usr2'] = $row['tech_users_username'];
                $_SESSION['pw']  = $row['tech_users_password'];
                $_SESSION['role']  = $row['tech_users_role'];
                header('Location: HrHomePage.php');
                exit();
            }
            if ($row['tech_users_username'] == $_POST['username'] && $row['tech_users_password'] == $_POST['password']                && $row['tech_users_role'] == 2) {
                $_SESSION['usr3'] = $_POST['username'];
                $_SESSION['pw']  = $_POST['password'];
                $_SESSION['role']  = $_POST['role'];
                $_SESSION['tech_users_id']  = $row['tech_users_id'];
                header('Location: TrCandidateList.php');
                exit();
            }
        }
        echo "<h2>Please Check Login Details</h2>";
    }
}
?>
<?php include 'LogInForm.html';?>