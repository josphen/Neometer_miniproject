<?php
 session_start();
 require_once "connection.php";
 $msg = "";
 $role="";
 if(isset($_POST["btn"]))
 {
	 $username = $_POST["email"];
	 $password = $_POST["psw"];
	 
	//$query = "SELECT lg.*,rg.is_verified FROM tbl_login lg inner join tbl_registration rg on lg.lg_id=rg.lg_id WHERE lg_email='$username' AND lg_password='$password'";
		$query1 ="SELECT * FROM tbl_login WHERE lg_email='$username' AND lg_password='$password'";
		$result1 = mysqli_query($conn,$query1);
		$checkcount1=mysqli_num_rows($result1);
		$query2 ="SELECT * FROM tbl_registration WHERE reg_email='$username'";
		$result2 = mysqli_query($conn,$query2);
		$row2 = mysqli_fetch_assoc($result2);
	if ($checkcount1 > 0)
	{
		while($row1 = mysqli_fetch_assoc($result1))
		{
			if($row1["lg_role"] == "Admin")
			{
				$_SESSION['LoginUser'] = $row1["lg_email"];
				$_SESSION['LoginRole'] = $row1["lg_role"];
				header('Location: admin.php');
			}
			else if($row1["lg_role"] == "Expectant")
			{
				if($row2["is_verified"] == "1")
				{
				$_SESSION['Loginid'] = $row1["lg_id"];
				$_SESSION['LoginUser'] = $row1["lg_email"];
				$_SESSION['LoginRole'] = $row1["lg_role"];
				header('Location: expectant/expectant.php');
				//header('Location: admin.php');
				}
				else
				{
				echo "
					<script>
						alert('Email not Verified');
						window.location.href='lp.php';
					</script>
					";
				}
			
				
			}
			else
			{
				$_SESSION['Loginid'] = $row1["lg_id"];
				$_SESSION['LoginUser'] = $row1["lg_email"];
				$_SESSION['LoginRole'] = $row1["lg_role"];
				header('Location: specialist/specialist.php');
			}
			
		}
	}
	else
	{
		echo "<script> alert('Invalid E-mail or Password'); </script>";
		header('Location: lp.php');
	}
	 
 }
 
 echo $role;
 //echo $msg = "Invalid E-mail and Password";

?>