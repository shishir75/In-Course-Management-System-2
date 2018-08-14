<?php include_once 'includes/header.php'; ?>
<?php
	if($getFromU->loggedIn() === false) {
		header("Location: index.php");
	}
?>

<?php
	if (isset($_GET['batch']) && isset($_GET['course_id'])) {
		$batch     = $_GET['batch'];
		$course_id = $_GET['course_id'];
		if (!empty($batch) && !empty($course_id)) {
			$batch 		 = $getFromU->checkInput($batch);
			$course_id = $getFromU->checkInput($course_id);
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
				<h2 class="text-center mb-4">Tutorial Marks of <?php echo $batch; ?> Batch</h2>
				<h5 class="text-center mb-4">Course Name : <?php echo $course->course_name; ?></h5>
				<h6 class="text-center mb-4">Teacher Name : <?php echo $teacher_name; ?></h6>

				<?php if ($getFromU->teacher_only() === true && $_SESSION['teacher_code'] == $teacher_code) : ?>
					<a href="tutorial.php?course_id=<?php echo $course_id ?>&batch=<?php echo $batch; ?>" class="btn btn-sm btn-primary mb-3">Add New Tutorial</a>
				<?php endif ?>








				<table class="table table-bordered table-hover">
				  <thead style="background-color: #B7CDDA;">
				    <tr class="text-center">
				      <th scope="col">Serial</th>
				      <th scope="col">Roll</th>
				      <th scope="col">Student Name</th>

							<?php
								$columns = $getFromU->view_tutorial_column_by_batch_course_id($batch, $course_id);
								foreach ($columns as $column) {
									$tutorial_no = $column->Field;
							?>
							<th scope="col"><?php echo ucwords($tutorial_no); ?></th>
							<?php } ?>






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


								<?php

									$columns = $getFromU->view_tutorial_column_by_batch_course_id($batch, $course_id);
									foreach ($columns as $column) {
										$tutorial_no = $column->Field;
										$tutorial_values = $getFromU->view_tutorial_by_roll2($batch, $course_id , $roll);
										//var_dump($att_date);


										foreach ($tutorial_values as $tutorial_value) {
											$value = $tutorial_value->{"$tutorial_no"};

								?>

								<td>
									<?php echo $value; ?>
								</td>

								<?php } ?>

							<?php 	} ?>


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