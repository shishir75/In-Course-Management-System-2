<?php include_once 'includes/header.php'; ?>
<?php
	error_reporting(E_ERROR | E_PARSE);

	if($getFromU->loggedIn() === false) {
		header("Location: index.php");
	}
?>


<?php
	if (isset($_GET['course_id']) && isset($_GET['batch'])) {
		$course_id = $_GET['course_id'];
		$batch 		 = $_GET['batch'];
		if (!empty($course_id) && !empty($batch)) {
			$course_id = $getFromU->checkInput($course_id);
			$batch = $getFromU->checkInput($batch);
		}
	}
?>

<?php

	$course = $getFromU->viewCourseById($course_id);

	$view_teacher_code_by_course_id_batch = $getFromU->view_teacher_code_by_course_id_batch($course_id, $batch);

	$teacher_code = $view_teacher_code_by_course_id_batch->teacher_code;

	$teacher = $getFromU->viewTeacherByCode($teacher_code);
	$teacher_name = $teacher->teacher_name;

?>



<?php include_once 'includes/heading.php'; ?>
<?php include_once 'includes/navbar.php'; ?>



<section class="summary mt-5">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="text-center">Marks Details</h2>
				<h4 class="text-center">Course Name :  <?php echo $course->course_name; ?> </h4>
				<h5 class="text-center">Batch : <?php echo $batch; ?></h5>
				<h6 class="text-center mb-4">Teacher Name : <?php echo $teacher_name; ?></h6>

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




				<table class="table table-bordered table-hover">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">Serial</th>
				      <th scope="col">Roll No.</th>
				      <th scope="col">Student Name</th>
				      <th scope="col">Tutorial Matks</th>
				      <th scope="col">Attendence Marks</th>
				      <th scope="col">Assignment Marks</th>
				      <th scope="col">Total Marks</th>
				    </tr>
				  </thead>
				  <tbody>



				  	<?php
				  		$rows = $getFromU->viewStudentsByBatch($batch);
				  		$i = 0;
				  		foreach ($rows as $row) {
				  			$roll = $row->roll;
				  			$student_name = $row->student_name;
				  			$batch = $row->batch;
				  			$i++;

				  			$columns = $getFromU->view_tutorial_column_by_batch_course_id($batch, $course_id);
								//var_dump($columns);
								foreach ($columns as $column) {
									$tutorial_no = $column->Field;

				  	?>
				  		<?php 	} ?>


							<tr>
					      <td class="text-center"><?php echo $i; ?></td>
					      <td class="text-center"><?php echo $roll; ?></td>
					      <td class="text-center"><?php echo $student_name; ?></td>

					      <td class="text-center">
					      	<?php
					      		$marks = array();
					      		$tutorial_marks = $getFromU->view_tutorial_by_roll($batch, $course_id , $roll);
										$marks[] = $tutorial_marks;

										foreach ($marks as $numbers) {
											$tutu_marks = $getFromU->best_two_avg_find($numbers);
										}
						      ?>
						      <?php echo $tutu_marks; ?>



					      </td>



					      <td class="text-center">
					      	<?php
					      		$values = array();
					      		$attendence_marks = $getFromU->view_all_attendene_by_roll($batch, $course_id , $roll);
					      		//var_dump($attendence_marks);
										$values[] = $attendence_marks;

										foreach ($values as $value) {
											$att_marks = $getFromU->attendence_value_count($value);
										}
						      ?>
						      <?php echo $att_marks; ?>

					      </td>

					      <td class="text-center">
					      	<?php
					      		$marks = array();
					      		$assignment_marks = $getFromU->view_assignment_by_roll($batch, $course_id , $roll);
					      		//var_dump($assignment_marks);
										$marks[] = $assignment_marks;

										foreach ($marks as $numbers) {
											$ass_marks = $getFromU->best_two_avg_find($numbers);
										}
						      ?>
						      <?php echo $ass_marks; ?>

					      </td>

					      <td class="text-center">
					      	<?php
					      		$total = $tutu_marks + $att_marks + $ass_marks;
					      		echo $total;

					      	?>

					      </td>


				  	<?php } ?>

				  </tbody>
				</table>


				<a href="download.php?course_id=<?php echo $course_id ?>&batch=<?php echo $batch; ?>" class="btn btn-primary mt-4 float-right" >Download PDF</a>




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