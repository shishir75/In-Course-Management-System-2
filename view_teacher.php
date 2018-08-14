<?php include_once 'includes/header.php'; ?>
<?php
	if($getFromU->loggedIn() === false) {
		header("Location: index.php");
	}
?>

<?php
	if (isset($_GET['t_code']) && !empty($_GET['t_code'])) {
		$teacher_code = $_GET['t_code'];
		if (!empty($teacher_code)) {
			$teacher_code = $getFromU->checkInput($teacher_code);

			$teacher = $getFromU->viewTeacherByCode($teacher_code);
		}
	}
?>


<?php
	if (isset($_POST['assign_new_course'])) {
		$course_id = $_POST['course_id'];
		$batch = $_POST['batch'];
		$teacher_code = $_POST['teacher_code'];

		if (!empty($course_id) && !empty($batch) && !empty($teacher_code)) {
			$course_id = $getFromU->checkInput($course_id);
			$batch = $getFromU->checkInput($batch);
			$teacher_code = $getFromU->checkInput($teacher_code);

			if (strlen($course_id) != 4 ) {
				$error = "Course Code must be 4 Digit Number";
			}elseif (strlen($batch) != 2 ) {
				$error = "Invalid Batch Number";
			}elseif ($getFromU->checkTeacher($teacher_code) === false) {
				$error = "Invalid Teacher";
			}elseif ($getFromU->checkCourse($course_id) === false) {
				$error = "Invalid Course Code";
			}elseif ($getFromU->checkBatch($batch) === false) {
				$error = "Invalid Batch";
			}elseif ($getFromU->check_by_Course_Batch_teacher($course_id, $batch, $teacher_code) === true) {
				$error = "$course_id is already assigned you for $batch Batch";
			}elseif ($getFromU->check_by_Course_Batch($course_id, $batch) === true) {
				$error = "This course id <b>$course_id</b> already assigned to another Teacher for <b>$batch</b> Batch";
			}
			else {
				$assign_new_course = $getFromU->create("course_by_teacher_batch", array('course_id' => $course_id, 'teacher_code' => $teacher_code, 'batch' => $batch));
				if (isset($assign_new_course)) {
					$new_course_msg = "New Course Assigned Successfully";
				}
			}

		}else {
			$error = "All Fields are Required";
		}

	}

?>



<?php include_once 'includes/heading.php'; ?>
<?php include_once 'includes/navbar.php'; ?>
<?php include_once 'includes/add_new_course.php'; ?>


<section class="summary mt-5">
	<div class="container">
		<div class="row">
			<div class="col-10 offset-1">
				<h2 class="text-center mb-3">Teacher Details Log</h2>
				<h4 class="text-center mb-4">Teacher Name : <?php echo $teacher->teacher_name; ?></h4>

				<?php if (isset($assign_new_course)): ?>
						 <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            	<?php echo $new_course_msg; ?>
            	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
          	</div>
					<?php endif ?>

					<?php if (isset($error)): ?>
						 <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            	<?php echo $error; ?>
            	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
          	</div>
					<?php endif ?>

				<?php if ($getFromU->admin_only() === true): ?>
					<button type="button" class="btn btn-sm btn-info mb-3" data-toggle="modal" data-target="#exampleModalCenter3">Assign New Course</button>
				<?php endif ?>



				<table class="table table-bordered table-hover">
				  <thead class="thead-dark">
				    <tr class="text-center">
				      <th scope="col">Serial</th>
				      <th scope="col">Course Code</th>
				      <th scope="col">Course Name</th>
				      <th scope="col">Batch</th>
				      <th scope="col">Attendence</th>
				      <th scope="col">Tutorial</th>
				      <th scope="col">Assignment</th>
				      <th scope="col">Marks</th>
				    </tr>
				  </thead>
				  <tbody>

				  	<?php
				  		$rows = $getFromU->teacher_course_join($teacher_code);
				  		$i = 0;
				  		foreach ($rows as $row) {
				  			$course_id = $row->course_id;
				  			$course_name = $row->course_name;
				  			$batch = $row->batch;
				  			$i++;

				  			$total_class 	 = $getFromU->count_number_of_class_taken($batch, $course_id) - 2;
								if ($total_class <= 0) {
									$total_class = 0;
								}


								$total_tutorial = $getFromU->count_number_of_tutorial_taken($batch, $course_id) - 2;
								if ($total_tutorial <=0) {
									$total_tutorial = 0;
								}

								$total_assignment = $getFromU->count_number_of_assignment_taken($batch, $course_id) - 2;
								if ($total_assignment <=0) {
									$total_assignment = 0;
								}
				  	?>

							<tr>
					      <td class="text-center"><?php echo $i; ?></td>
					      <td class="text-center"><?php echo $course_id; ?></td>
					      <td class="text-center"><?php echo $course_name; ?></td>
					      <td class="text-center"><?php echo $batch; ?></td>
					      <td class="text-center">
					      	<a href="view_attendence.php?course_id=<?php echo $course_id; ?>&batch=<?php echo $batch; ?>"><?php echo $total_class; ?></a>
					      </td>
					      <td class="text-center">
					      	<a href="view_tutorial.php?course_id=<?php echo $course_id; ?>&batch=<?php echo $batch; ?>" ><?php echo $total_tutorial; ?></a>
					      </td>
					      <td class="text-center">
					      	<a href="view_assignment.php?course_id=<?php echo $course_id; ?>&batch=<?php echo $batch; ?>" ><?php echo $total_assignment; ?></a>
					      </td>
					      <td class="text-center">
					      	<a class="btn btn-sm btn-info" href="marks.php?course_id=<?php echo $course_id; ?>&batch=<?php echo $batch; ?>" >View</a>
					      </td>
				   		 </tr>

				  	<?php } ?>
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