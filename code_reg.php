<?php
 //session_start();
 include "connection.php";
 //$msg = "";
 //$role="";
 
	$name = $_POST["name"];
	 $email = $_POST["remail"];
	 $password = $_POST["rpsw"];
	 $dob = $_POST["dt"];
	 $role = "Expectant";
	 $v_code = bin2hex(random_bytes(16));
	 
	 
 use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 
 
 function sendMail($email,$v_code)
 {
	 require ("PHPMailer/PHPMailer.php");
	 require ("PHPMailer/SMTP.php");
	 require ("PHPMailer/Exception.php");
	 
	 $mail = new PHPMailer(true);
	 
	 try {
    //Server settings
                        
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'neometer00@gmail.com';                     //SMTP username
    $mail->Password   = 'tildwifwaborxrim';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('neometer00@gmail.com', 'NEOMETER');
    $mail->addAddress($email);     
   

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Email Verification from Neometer';
    $mail->Body    = "Thanks for registration!.<br>Click the link below to verify the email.<br> <a href='http://localhost/neometer/verify.php?email=$email&v_code=$v_code'>Verify</a>";
  

    $mail->send();
    return true;
} catch (Exception $e) 
{
    //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	return false;
}
 
 }
 
 if(isset($_POST["submit"]))
 {
	 
	 
	 //$select = " SELECT * FROM tbl_registration WHERE reg_email = '$email' && reg_password = '$password'";
	 //$result = mysqli_query($conn, $select);

  // if(mysqli_num_rows($result) > 0){

     // $error[] = 'user already exist!';

  // }
  // else{
/**
         $sql = "INSERT INTO tbl_registration(reg_name, reg_dob, reg_password, reg_email) VALUES ('$name', '$dob', '$password', '$email')";
         if($conn->query($sql) === TRUE)
		 {
			 $sql1 = "INSERT INTO tbl_login(lg_email, lg_password, lg_role) VALUES ('$email', '$password', '$role')";
			 if($conn->query($sql1) === TRUE)
			 {
				 echo "Successful inserted login";
			 }
			 else
		    {
				 echo "Insertion failed in login";
		    }
			header('Location:lp.php'); 
			echo "Successful inserted";
		 }
		 else
		 {
			 echo "Insertion failed";
		 }
         **/
      $duplicate=mysqli_query($conn, "SELECT * from tbl_login WHERE lg_email='$email'");
	   if(mysqli_num_rows($duplicate)>0)
    {
      echo "<script> alert('Already  Registered'); </script>";
	  header('Location:lp.php'); 
	  
    }
    else
    {
      $sql="INSERT INTO tbl_login(lg_email, lg_password,lg_role) VALUES ('$email', '$password','$role')";
      if($conn->query($sql)=== TRUE)
      {
          $val="SELECT lg_id from tbl_login WHERE lg_email='".$email."'";
          if($res=$conn->query($val))
          {
		
            foreach($res as $data)
            {

            $login_id=$data['lg_id'];
			
            $sql1="INSERT INTO tbl_registration(lg_id, reg_name, reg_email, reg_dob, verification_code, is_verified) VALUES ('$login_id','$name','$email', '$dob','$v_code','0')";
            if(mysqli_query($conn,$sql1) && sendMail($email,$v_code))
            {
              echo "<script> alert('Registered'); </script>";
			  header('Location:lp.php');
            }
          }
      }
    }
    }
	  
	  
   }
 //}	 
	 

?>
