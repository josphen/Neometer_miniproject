<?php

//print_r($_POST);
include('connection.php');

//echo"hi";


if(isset($_POST['delete_btn']))
{
	
	$del_id = $_POST['delete_id'];
	$query = "UPDATE tbl_specialist SET sp_status=1 WHERE sp_id='$del_id'";
	echo"hi";
	$query_run = mysqli_query($conn, $query);
	if($query_run)
    {
        //$_SESSION['status'] = "Your Data is Updated";
        //$_SESSION['status_code'] = "success";
		echo "<script> alert('Removed'); </script>";
        header('Location: reg_gyno.php'); 
    }
	
}
?>