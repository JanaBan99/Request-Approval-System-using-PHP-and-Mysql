<?php 
	session_start();
	include('inc/head.php'); 
	

	if (isset($_SESSION['email'])) {
		
	}
	else{
		header('location:index.php');
		exit();
	}

?>
<body>

	<nav class="navbar navbar-toggleable-sm navbar-inverse bg-inverse p-0">
		<div class="container">
			<button class="navbar-toggler toggler-right" data-target="#mynavbar" data-toggle="collapse">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a href="#" class="navbar-brand mr-3">Request Approval System</a>
			<div class="collapse navbar-collapse" id="mynavbar">
				<ul class="navbar-nav">
					<li class="nav-item px-2"><a href="#" class="nav-link active">Logged in as <?php echo $_SESSION['email']?></a></li>
					
				</ul>
				<ul class="navbar-nav ml-auto">
					<li class="nav-item dropdown mr-3">
						
						<li class="nav-item">
							<a href="logout.php" class="nav-link"><i class="fa fa-power-off"></i> Logout</a>
						</li>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!--This Is Header-->
	
	<header id="main-header" class="bg-primary py-2 text-white">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h1><i class="fa fa-tachometer"></i> Dashboard</h1>
				</div>
			</div>
		</div>
	</header>
	<!--This is section-->

	<section id="sections" class="py-4 mb-4 bg-faded">
		<div class="container">
			<div class="row">
				<div class="col-md"></div>
				<div class="col-md-3">
					<a href="#" class="btn btn-primary btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#addPostModal"><i class="fa fa-plus"></i> Apply</a>
				</div>
				<div class="col-md"></div>
			</div>
		</div>
	
	</section>
	<!----Main table ---->
	
	<section id="post">
		<div class="container">
			<div class="row">
			<table class="table table-bordered table-hover table-striped">
							<thead>
								<th>#</th>
								<th>Name</th>
								<th>System</th>
								<th>Date</th>
								<th>User Rights</th>
								<th>Comments</th>
								<th>IB Approval</th>
								<th>DH Approval</th>
								<th>System Admin</th>
								
								
							</thead>
							 <tbody>
							 	<?php 
									$sql = "SELECT *, comments FROM projects_to_be_approved WHERE email='".$_SESSION['email']."'";
									$que = mysqli_query($con,$sql);
									$cnt=1;
									while ($result = mysqli_fetch_assoc($que)) {
									?>

									
							 	<tr>
									<td><?php echo $cnt;?></td>
							 		<td><?php echo $result['name']; ?></td>
							 		<td><?php echo $result['system']; ?></td>
							 		<td><?php echo $result['date']; ?></td>
							 		<td><?php echo $result['user_rights']; ?></td>
									<td><?php echo $result['comments']; ?></td>
									
							 		<td>
							 			<?php 
							 			if ($result['status'] == 0) {
							 				echo "<span class='badge badge-warning'>Pending</span>";
							 			}
										 elseif ($result['status'] == 34) {
											echo "<span class='badge badge-danger'>Rejected</span>";}
							 			else{
											echo "<span class='badge badge-success'>Approved</span>";}

										//$cnt++;	}
										?>
									
							 		</td>
									

									 <td>
							 			<?php 
							 			if ($result['status2'] == 0) {
							 				echo "<span class='badge badge-warning'>Pending</span>";
							 			}
										 elseif ($result['status2'] == 34) {
											echo "<span class='badge badge-danger'>Rejected</span>";}
							 			else{
											echo "<span class='badge badge-success'>Approved</span>";}

										//$cnt++;	}
										?>
									
							 		</td>
									 </td>

									<td>
										<?php 
										if ($result['status3'] == 0) {
											echo "<span class='badge badge-warning'>Pending</span>";
										}
										elseif ($result['status3'] == 34) {
											echo "<span class='badge badge-danger'>Rejected</span>";}
										else{
										echo "<span class='badge badge-success'>Approved</span>";}

									$cnt++;	}
									?>

									</td>
									
									
   									
								</tr>


							</tbody>
						</table>
			</div>
		</div>
	</section>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<!---- footer ---->
	<section id="main-footer" class="text-center text-white bg-inverse mt-4 p-4">
		<div class="container">
			<div class="row">
				<div class="col">
				<p class="lead">&copy; <?php echo date("Y")?> Nvision</p>
				</div>
			</div>
		</div>
	</section>
	
	<!-- Apply Modal -->
    <!-- Header Post -->
	<div class="modal fade" id="addPostModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-primary text-white">
					<div class="modal-title">
						<h5>Apply</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
					<form action="" method="post">
						<div class="form-group">
							<label class="form-control-label">Name</label>
							<input type="text" name="name" class="form-control"/>
							<input type="hidden" name="email" value="<?php echo $_SESSION['email']?>">
							<label class="form-control-label">System</label>
							<select name="system" class="form-control" >
								<option value=" "></option>
								<option value=" Rukus"> Rukus</option>
								<option value=" HFCL"> HFCL</option>
								<option value=" GWN">GWN</option>
								<option value=" Cisco"> Cisco</option>
								<option value=" Cambium"> Cambium</option>
								<option value=" Huawei"> Huawei</option>
							</select>
							<label class="form-control-label">User Rights</label>
							<select name="user_rights" class="form-control" >
								<option value="User Rights"></option>
								<option value="Admin">Admin</option>
								<option value="User">User</option>
							</select>							
						</div>
						<div class="form-group">
        					<label>   </label>
        					<input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>">
    					</div>
						
			
				<div class="modal-footer">
					<button class="btn btn-danger" style="border-radius:0%;" data-dismiss="modal">Close</button>
					<input type="hidden" name="status" value="0">
					<input type="submit" class="btn btn-success" style="border-radius:0%;" name="apply"  value="Apply">
				</div>
			</form>
			</div>
		</div>
	</div>
  
  <script src="js/jquery.min.js"></script>
  <script src="js/tether.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>
  <script>
	CKEDITOR.replace('editor1');
  </script>
</body>
</html>
<?php 
	if (isset($_POST['apply'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$system = $_POST['system'];
		$date = $_POST['date'];
		$user_rights = $_POST['user_rights'];
		$status = $_POST['status'];

		$sql = "INSERT INTO projects_to_be_approved(name,email,system,date,user_rights,status)
		VALUES('$name','$email','$system','$date','$user_rights','$status')";

		$run = mysqli_query($con,$sql);

		if($run == true){
			
			echo "<script> 
					alert('Project approval Requested, Please wait for approval status');
					window.open('dashboard.php','_self');
				  </script>";
		}else{
			echo "<script> 
			alert('Failed To Apply');
			</script>";
		}
	}
	
 ?>