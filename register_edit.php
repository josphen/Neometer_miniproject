<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('connection.php');
?>


<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> EDIT Admin Profile </h6>
        </div>
        <div class="card-body">
		
		
		
		<?php
		include('connection.php');

		?>
					
					
		
		
		<form action="update1.php" method="POST">
		<!--<input type="text" name="edit_id" value="<?php// echo $id ?>">-->
		<?php
		if(isset($_POST['edit_btn']))
			{
				$id = $_POST['edit_btn'];
				$query = "SELECT * FROM tbl_specialist WHERE sp_id='$id' ";
				$query_run = mysqli_query($conn, $query);
				
				foreach($query_run as $row)
                {
					?>
		<div class="form-group">
			
                <label><b>Name </b></label>
                <input type="text" name="up_name" class="form-control" value="<?php echo $row["sp_name"]?>" placeholder="Enter Fullname">
            </div>
            
			<div class="form-group">
                <label><b>Date of Birth</b></label>
                <input type="date" name="up_dob" class="form-control" value="<?php echo $row["sp_dob"]?>" placeholder="Enter Date of Birth">
            </div>
			
            <div class="form-group">
                <label><b>Address</b></label>
                <textarea name="up_address" class="form-control" value="<?php echo $row["sp_address"]?>" placeholder="Enter Address"><?php echo $row["sp_address"]?></textarea>
            </div>
			<div class="form-group">
                <label><b>Qualification</b></label>
                <input type="text" name="up_qul" class="form-control" value="<?php echo $row["sp_qual"]?>" placeholder="Enter Qualification">
            </div>
			 <div class="form-group">
				<label><b>Degree Certificate</b></label>
				<input type="file" name="up_certificate" class="form-control" value="<?php echo $row["sp_degcert"]?>" placeholder="Upload Degree Certificate">
            </div>
			<div class="form-group">
				<label><b>Years of Experience</b></label>
				<input type="number" name="up_exp_yr" class="form-control" value="<?php echo $row["sp_experience"]?>" placeholder="Enter as YYYY ">
            </div>
			 <div class="form-group">
                <label><b>Experience Certificate</b></label>
                <input type="file" name="up_exp_certificate" class="form-control" value="<?php echo $row["sp_expcert"]?>" placeholder="Upload Experience Certificate">
            </div>
			<div class="form-group">
				<label><b>Consultation Fees</b></label>
				<input type="number" name="up_fee" class="form-control" value="<?php echo $row["sp_amount"]?>" placeholder="Enter amount">
            </div>
        </div>
		
		<a href="reg_gyno.php" class="btn btn-danger"> CANCEL </a><br>
		<button type="submit" id="updatebtn" name="updatebtn" value ="<?=$row['sp_id']?>" class="btn btn-primary"> UPDATE </button>
		</form>
		
		<?php
				}
			}

?>
		
		
		
		</div>
		</div>
		</div>
	</div>

<?php
include('scripts.php');
include('includes/footer.php');
?>