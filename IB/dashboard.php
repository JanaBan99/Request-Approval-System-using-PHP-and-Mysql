<?php 
	session_start();
	include('inc/head.php'); 
	
	if (isset($_SESSION['email'])) {
		
	}
	else{
		header('location:index.php');
	}

?>
<body>
	<nav class="navbar navbar-toggleable-sm navbar-inverse bg-inverse p-0">
		<div class="container">
			<button class="navbar-toggler toggler-right" data-target="#mynavbar" data-toggle="collapse">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a href="#" class="navbar-brand mr-3">Approval System</a>
			<div class="collapse navbar-collapse" id="mynavbar">
				
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
	<header id="main-header" class="bg-danger py-2 text-white">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h1><i class="fa fa-user-secret"></i> Immediate Boss Panel</h1>
				</div>
			</div>
		</div>
	</header>
	<br><br>

	<!----Section2 for showing Post Model ---->
	<section id="post">
		<div class="container">
			<div class="row">
			<table class="table table-bordered table-hover table-striped">
							<thead class="text-center">
								<th>#</th>
								<th>Name</th>
								<th>System</th>
								<th>Date</th>
								<th>User Rights</th>
								<th>Status</th>
								<th>Action</th>
							</thead>
							 <tbody>
							 	<?php 
									$sql = "SELECT * FROM projects_to_be_approved";
									$que = mysqli_query($con,$sql);
									$cnt = 1;
									while ($result = mysqli_fetch_assoc($que)) {
										
									?>

									
								<tr class="text-center">
									<td><?php echo $cnt;?></td>
							 		<td><?php echo $result['name']; ?></td>
							 		<td><?php echo $result['system']; ?></td>
							 		<td><?php echo $result['date']; ?></td>
							 		<td><?php echo $result['user_rights']; ?></td>
							 		<td>
							 			<?php 
							 			if ($result['status'] == 0) {
							 				echo "<span class='badge badge-warning'>Pending</span>";}
										elseif($result['status'] == 34){
											echo "<span class='badge badge-danger'>Rejected</span>";
										}
										else{
											echo "<span class='badge badge-success'>Approved</span>";
										}
							 				?>
							 		</td>
							 		<td>
									<?php
										if ($result['status']==0){
									?>		
										
							 			<form action="accept.php?id=<?php echo $result['id']; ?>" method="POST" style="display:inline">
							 				<input type="hidden" name="appid" value="<?php echo $result['id']; ?>">
							 				<input type="submit" class="btn btn-sm btn-success" name="approve" value="Approve">
							 			</form>
										 <div style="width: 10px; display: inline-block;"></div>
										 <form action="reject.php?id=<?php echo $result['id']; ?>" method="POST" style="display:inline">
							 				<input type="hidden" name="appid" value="<?php echo $result['id']; ?>">
							 				<input type="submit" class="btn btn-sm btn-danger" name="reject" value="Reject">
							 			</form>
									<?php
									}
									?>
							 		</td>
							 				<?php
							 			
							 			
							 	$cnt++;	}
							 		 ?>
							 		
							 	</tr>

							 </tbody>
						</table>
			</div>
		</div>
	</section>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<!----Section3 footer ---->
	<section id="main-footer" class="text-center text-white bg-inverse mt-4 p-4">
		<div class="container">
			<div class="row">
				<div class="col">
				<p class="lead">&copy; <?php echo date("Y")?> Nvision</p>
				</div>
			</div>
		</div>
	</section>

  
  <script src="js/jquery.min.js"></script>
  <script src="js/tether.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>
  <script>
	CKEDITOR.replace('editor1');
  </script>

</body>
</html>


