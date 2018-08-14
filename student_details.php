<?php include_once 'includes/header.php'; ?>
<?php
	error_reporting(E_ERROR | E_PARSE);

	if($getFromU->loggedIn() === false) {
		header("Location: index.php");
	}
?>

<?php
	if (isset($_GET['student_id'])) {
		$student_id = $_GET['student_id'];
		if (!empty($student_id)) {
			$student_id = $getFromU->checkInput($student_id);

			$student = $getFromU->viewStudentsById($student_id);

			$batch = $student->batch;
			$roll  = $student->roll;
		}
	}


?>





<?php include_once 'includes/heading.php'; ?>
<?php include_once 'includes/navbar.php'; ?>



<section class="summary mt-5">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="text-center">Student Details</h2>
				<h4 class="text-center">Batch : <?php echo $batch; ?></h4>
				<h5 class="text-center">Student Name : <?php echo $student->student_name; ?></h5>
				<h6 class="text-center mb-5">Roll : <?php echo $roll; ?></h6>






				<table class="table table-bordered table-hover">
				  <thead class="bg-info text-white">
				    <tr class="text-center">
				      <th scope="col">Serial</th>
				      <th scope="col">Course ID</th>
				      <th scope="col">Teacher Code</th>
				      <th scope="col">Total Classes</th>
				      <th scope="col">Total Present</th>
				      <th scope="col">Total Absent</th>
				      <th scope="col">Attendece Marks</th>
				      <th scope="col">Tutorial Marks</th>
				      <th scope="col">Assignment Marks</th>
				      <th scope="col">Total Marks</th>


				    </tr>
				  </thead>
				  <tbody>

				  	<?php

				  		$rows = $getFromU->view_course_id_teacher_code_by_batch($batch);
				  		$i = 0;
							foreach ($rows as $row) {
								$course_id 				= $row->course_id;
								$teacher_code = $row->teacher_code;
								$i++;

								//$total_student = $getFromU->count_total_student_by_batch($batch);
								$total_class 	 = $getFromU->count_number_of_class_taken($batch, $course_id) - 2;
								$total_tutorial 	 = $getFromU->count_number_of_tutorial_taken($batch, $course_id) - 2;
								$total_assignment 	 = $getFromU->count_number_of_assignment_taken($batch, $course_id) - 2;
								if ($total_class <= 0) {
									$total_class = 0;
								}
								if ($total_tutorial <= 0) {
									$total_tutorial = 0;
								}
								if ($total_assignment <= 0) {
									$total_assignment = 0;
								}

						?>

						<tr class="text-center">
							<td><?php echo $i; ?></td>
							<td><?php echo $course_id; ?></td>
              <td><?php echo $teacher_code; ?></td>
							<td class="text-center">
				      	<a href="view_attendence.php?course_id=<?php echo $course_id; ?>&batch=<?php echo $batch; ?>"><?php echo $total_class; ?></a>
				      </td>
				      <td class="text-center">
				      	<?php
					      		$values = array();
					      		$attendences = $getFromU->view_all_attendene_by_roll($batch, $course_id , $roll);
					      		//var_dump($attendence_marks);
										$values[] = $attendences;

										foreach ($values as $value) {
											$present_attendence_count = $getFromU->present_attendence_count($value);
										}
						      ?>
				      	<?php echo $present_attendence_count; ?>
				      </td>
				      <td class="text-center">
				      	<?php
					      		$values = array();
					      		$attendences = $getFromU->view_all_attendene_by_roll($batch, $course_id , $roll);
					      		//var_dump($attendence_marks);
										$values[] = $attendences;

										foreach ($values as $value) {
											$absent_attendence_count = $getFromU->absent_attendence_count($value);
										}
						      ?>
				      	<?php echo $absent_attendence_count; ?>
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
					      		$tutorial_marks = $getFromU->view_tutorial_by_roll($batch, $course_id , $roll);
										$marks[] = $tutorial_marks;

										foreach ($marks as $numbers) {
											$tutu_marks = $getFromU->best_two_avg_find($numbers);
										}
						      ?>
				      	<a href="view_tutorial.php?course_id=<?php echo $course_id; ?>&batch=<?php echo $batch; ?>" ><?php echo $tutu_marks; ?></a>
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
				      	<a href="view_assignment.php?course_id=<?php echo $course_id; ?>&batch=<?php echo $batch; ?>" ><?php echo $ass_marks; ?></a>
				      </td>

				      <td class="text-center">
				      	<?php
				      			$total = $tutu_marks + $att_marks + $ass_marks;
						      ?>
				      	<a href="marks.php?course_id=<?php echo $course_id; ?>&batch=<?php echo $batch; ?>" ><?php echo $total; ?></a>
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