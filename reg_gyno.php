<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('connection.php');
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Specialist Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="scripts.php" method="POST">

        <div class="modal-body">

             <div class="form-group">
			 <div class="form-group">
                <label><b>Specialisation</b></label><br>
                <input type="radio" id="gyno" name="special" value="Gynecologist">
				<label for="gyno">Gynecologist</label><br>
				<input type="radio" id="nutri" name="special" value="Nutritionist">
				<label for="nutri">Nutritionist</label><br>
				<input type="radio" id="phy" name="special" value="Physiotherapist">
				<label for="phy">Physiotherapist</label><br>
				<input type="radio" id="train" name="special" value="Personal Trainer">
				<label for="train">Personal Trainer</label><br>
            </div>
			
                <label><b>Name </b></label>
                <input type="text" name="name" class="form-control" placeholder="Enter Full name" required>
            </div>
            
			<div class="form-group">
                <label><b>Gender</b></label><br>
                <input type="radio" id="male" name="gender" value="Male">
				<label for="male">Male</label>
				<input type="radio" id="female" name="gender" value="Female">
				<label for="female">Female</label><br>
            </div>
			<div class="form-group">
                <label><b>Date of Birth</b></label>
                <input type="date" name="dob" class="form-control" placeholder="Enter Date of Birth">
            </div>
			<div class="form-group">
                <label><b>Email</b></label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label><b>Password</b></label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label><b>Address</b></label>
                <textarea name="address" class="form-control" placeholder="Enter Address"></textarea>
            </div>
			<div class="form-group">
                <label><b>Qualification</b></label>
                <input type="text" name="qul" class="form-control" placeholder="Enter Qualification">
            </div>
			 <div class="form-group">
				<label><b>Degree Certificate</b></label>
				<input type="file" name="certificate" class="form-control" placeholder="Upload Degree Certificate">
            </div>
			<div class="form-group">
				<label><b>Years of Experience</b></label>
				<input type="number" name="exp_yr" class="form-control" placeholder="Enter as YYYY ">
            </div>
			 <div class="form-group">
                <label><b>Experience Certificate</b></label>
                <input type="file" name="exp_certificate" class="form-control" placeholder="Upload Experience Certificate">
            </div>
			<div class="form-group">
				<label><b>Consultation Fees</b></label>
				<input type="number" name="fee" class="form-control" placeholder="Enter amount">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Specialist Profile 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Specialist Profile 
            </button>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID </th>
            <th>Name </th>
			<th>Specialisation</th>
			<th>Consultation Fee</th>
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>
     
          <tr>
		  	<?php
				$sql="SELECT * from tbl_specialist WHERE sp_status=0";
				$result=$conn-> query($sql);
      			$count=1;
      			if ($result-> num_rows > 0){
        			while ($row=$result-> fetch_assoc()) {
			?>
            <td> <?=$count?> </td>
            <td> <?=$row["sp_name"]?></td>
			<td> <?=$row["sp_role"]?> </td>
			<td> ₹ <?=$row["sp_amount"]?></td>
            <td>
				
			   <form action="register_edit.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row["sp_id"];?>">
                    <button  type="submit" name="edit_btn" value="<?=$row["sp_id"]?>" class="btn btn-success"> EDIT</button>
                </form>
				
				
            </td>
            <td>
                <form action="delete.php" method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $row["sp_id"];?>">
                  <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                </form>
            </td>
          </tr>
         <?php
            $count=$count+1;
          }
        }
      ?>
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('scripts.php');
include('includes/footer.php');
?>