<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('connection.php');
?>



<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Expectant Profile 
            
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID </th>
            <th>Name </th>
			<th>Email-ID </th>
            <th>Date of Birth</th>
            <th>Booking Details</th>
           
          </tr>
        </thead>
        <tbody>
     
          <tr>
		  <?php
				$sql="SELECT * from tbl_registration";
				$result=$conn-> query($sql);
      			$count=1;
      			if ($result-> num_rows > 0){
        			while ($row=$result-> fetch_assoc()) {
			?>
            <td> <?=$count?> </td>
            <td> <?=$row["reg_name"]?></td>
			<td> <?=$row["reg_email"]?></td>
            <td> <?=$row["reg_dob"]?></td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="edit_id" value="">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> VIEW </button>
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