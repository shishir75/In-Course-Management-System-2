<?php include_once 'includes/header.php'; ?>
<?php
	if($getFromU->loggedIn() === false) {
		header("Location: index.php");
	}
?>

<?php
	if (isset($_GET['batch'])) {
		$batch = $_GET['batch'];
		if (!empty($batch)) {
			$batch = $getFromU->checkInput($batch);
		}
	}


?>









<?php include_once 'includes/heading.php'; ?>
<?php include_once 'includes/navbar.php'; ?>



<section class="summary mt-5">
	<div class="container">
		<div class="row">
			<div class="col-10 offset-1">
				<h2 class="text-center">Students List</h2>
				<h3 class="text-center mb-4">Batch : <?php echo $batch; ?></h3>






				<table class="table table-bordered table-hover">
				  <thead style="background-color: #B7CDDA;">
				    <tr class="text-center">
				      <th scope="col">Serial</th>
				      <th scope="col">Roll</th>
				      <th scope="col">Student Name</th>
				      <th scope="col" width="250">Actions</th>
				    </tr>
				  </thead>
				  <tbody>

				  	<?php

				  		$students = $getFromU->viewStudentsByBatch($batch);
				  		$i = 0;
							foreach ($students as $student) {
								$student_id = $student->student_id;
								$roll = $student->roll;
								$student_name = $student->student_name;
								$batch = $student->batch;
								$i++;
						?>


							<tr class="text-center">
					      <td><?php echo $i; ?></td>
					      <td><?php echo $roll; ?></td>
					      <td><?php echo $student_name; ?></td>
					      <td>

									<div class="row">
										<div class="col-sm-6">
											<a href="student_details.php?student_id=<?php echo $student_id; ?>" class="btn btn-sm btn-info px-4">View</a>
										</div>
										<!-- <div class="col-sm-4">
											<?php //if ($getFromU->admin_and_teacher_only() === true): ?>
					      				<a href="course_update.php?student_id=<?php //echo $student_id; ?>" class="btn btn-sm btn-warning ml-0">Update</a>
					      			<?php //endif ?>
										</div> -->
										<div class="col-sm-6">
											<?php if ($getFromU->admin_only() === true): ?>
							      		<a href="view_courses.php?student_id=<?php echo $student_id; ?>" class="btn btn-sm btn-danger px-4">Delete</a>
							      	<?php endif ?>
										</div>
									</div>







					      </td>
					    </tr>

						<?php  	} ?>


				  </tbody>
				</table>


			</div>





		</div>
	</div>
</section>







<footer class="footer">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 offset-2">
				<p>Copyright: &copy IIT-6<sup>th</sup> Batch, JU</p>
			</div>
		</div>
	</div>
</footer>







<?php include 'includes/footer.php'; ?>