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

			$course = $getFromU->viewCourseById($course_id);

			$getFromU->create_table_batch_course_id($batch, $course_id);
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






<?php
	if (isset($_POST['submit_attend']) ) {
		$attend = $_POST['attend'];
 		$rawdate = htmlentities($_POST['date']);
		$date = date('d-m-Y', strtotime($rawdate));

		$batch     = $_GET['batch'];
		$course_id = $_GET['course_id'];

		$add_column = $getFromU->add_column($date, $batch, $course_id);


		foreach ($attend as $atn_key => $atn_value) {
			if ($atn_value == 'present') {
				$update_column = $getFromU->update_column($date, $batch, $course_id, $atn_key, 'present');

			} elseif ($atn_value == 'absent') {
				$update_column = $getFromU->update_column($date, $batch, $course_id, $atn_key, 'absent');
			}
 		}

 		header('Location: view_attendence.php?course_id='.$course_id.'&batch='.$batch);
 		//echo "Attendence Taken Successfully";
 	?>


 		<script>
			alert("Attendence Taken Successfully!");
		</script>

 <?php } ?>




<?php include_once 'includes/heading.php'; ?>
<?php include_once 'includes/navbar.php'; ?>


<section class="summary mt-5">
	<div class="container">
		<div class="row">
			<div class="col-10 offset-1">
				<form method="post">
					<h3 class="text-center mb-2">Batch : <?php echo $batch; ?></h3>
					<h5 class="text-center mb-4">Course Name : <?php echo $course->course_name; ?></h5>
					<h6 class="text-center mb-4">Teacher Name : <?php echo $teacher_name; ?></h6>

					<h6 class="text-center my-3"></h6>

					<div class="row">
						<div class="col-4 offset-4 mb-5 text-center">
							<h4>Select Date :</h4>  <input id="datepicker" name="date" class="text-dark border-1" required>
						</div>
					</div>




					<?php if (isset($update_column)): ?>
						 <div class="alert alert-success alert-dismissible fade show text-center" role="alert">

            	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
          	</div>

					<?php endif ?>


					<table class="table table-bordered table-hover">
					  <thead style="background-color: #B7CDDA;">
					    <tr class="text-center">
					      <th scope="col">Serial</th>
					      <th scope="col">Roll</th>
					      <th scope="col">Student Name</th>
					      <th scope="col">Attendence</th>
					    </tr>
					  </thead>
					  <tbody>
							<?php
					  		$rows = $getFromU->viewStudentsForAttendence($batch);
					  		$i = 0;
					  		$table_name = $batch."_".$course_id;
					  		foreach ($rows as $row) {
					  			$roll = $row->roll;
					  			$student_name = $row->student_name;

					  			if ($getFromU->check_by_Batch_Roll($batch, $roll, $course_id) === false) {
					  				$getFromU->create($table_name, array("roll" => $roll));
					  			}

					  			$i++
					  	?>

								<tr class="text-center">
						      <td><?php echo $i; ?></td>
						      <td><?php echo $roll; ?></td>
						      <td><?php echo $student_name; ?></td>
						      <td class="radio_tr" width="40%">
						      	<!-- <input type="radio" name="attend[<?php //echo $roll; ?>]" value="present" checked> Present
	                  <input type="radio" name="attend[<?php //echo $roll; ?>]" value="absent" class="ml-4" required> Absent -->

										<div class="row">
											<div class="col-6">
												<input type="radio" id="p-option[<?php echo $roll; ?>]" name="attend[<?php echo $roll; ?>]" value="present" checked>
												<label for="p-option[<?php echo $roll; ?>]">Present</label>
												<div class="check"></div>
											</div>
											<div class="col-6" >
												<input type="radio" id="a-option[<?php echo $roll; ?>]" name="attend[<?php echo $roll; ?>]" value="absent" class="ml-4">
												<label for="a-option[<?php echo $roll; ?>]" id="absent">Absent</label>
												<div class="check"></div>
											</div>
										</div>

						      </td>

						    </tr>

							<?php } ?>
					  </tbody>
					</table>

					<div class="row">
						<div class="col-sm-5">
							<a href="attendence.php?course_id=<?php echo $course_id; ?>&batch=<?php echo $batch; ?>"><button type="submit" class="btn btn-danger form-control mb-4" >Cancel</button></a>
						</div>
						<div class="col-sm-7">
							<a href=""><button type="submit" name="submit_attend" class="btn btn-success form-control mb-4" >Submit</button></a>
						</div>
					</div>
				</form>

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