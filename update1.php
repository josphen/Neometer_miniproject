<?php

//session_start();



include('connection.php');

//echo"hi";
//$btn = $_POST['updatebtn'];

if(isset($_POST['updatebtn']))
{
	echo"hi";
    $id = $_POST['updatebtn'];
	$dob = $_POST['up_dob'];
	$degree_certi = $_POST['up_certificate'];
	$exp_yrs = $_POST['up_exp_yr'];
	$exp_certi = $_POST['up_exp_certificate'];
	$name = $_POST['up_name'];
	$address = $_POST['up_address'];
	$qualification = $_POST['up_qul'];
	$fee = $_POST['up_fee'];
			
	
	$query = "UPDATE tbl_specialist SET sp_name = '$name', sp_address = '$address', sp_experience = '$exp_yrs', sp_amount = '$fee', sp_degcert = '$degree_certi', sp_expcert = '$exp_certi', sp_qual = '$qualification',sp_dob ='$dob' WHERE sp_id = '$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        //$_SESSION['status'] = "Your Data is Updated";
        //$_SESSION['status_code'] = "success";
		echo "<script> alert('Your Data is Updated'); 
		window.location.href='reg_gyno.php';</script>";
        //header('Location: reg_gyno.php'); 
    }
    else
    {
       // $_SESSION['status'] = "Your Data is NOT Updated";
       // $_SESSION['status_code'] = "error";
	   echo "<script> alert('Your Data is not Updated'); 
	   window.location.href='reg_gyno.php';
	   </script>";
       // header('Location: reg_gyno.php'); 
    }
}
/**else
{
	echo"hi";
}
**/

?>