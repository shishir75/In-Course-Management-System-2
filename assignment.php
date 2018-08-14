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

			$getFromU->create_assignment_table_by_batch_course_id($batch, $course_id);
		}
	}

?>

<?php
	if (isset($_POST['submit_assignment']) ) {
		$assignment_marks = $_POST['assignment_marks'];
		$assignment_no = $_POST['assignment_no'];

		$batch     = $_GET['batch'];
		$course_id = $_GET['course_id'];

		if (!empty($assignment_marks) && !empty($assignment_no)) {
			$assignment_no = $getFromU->checkInput($assignment_no);


			$batch = $getFromU->checkInput($batch);
			$course_id = $getFromU->checkInput($course_id);

			$add_column = $getFromU->add_assignment_column($assignment_no, $batch, $course_id);


			foreach ($assignment_marks as $ass_key => $assignment_mark) {

					if ($assignment_mark >= 0 && $assignment_mark <= 10) {
						$update_column = $getFromU->update_assignment_column($assignment_no, $batch, $course_id, $ass_key, $assignment_mark);
					}else {
						$error = "Assignment marks must be in between 0-10";
					}

				}



		}else {
			$error = "All Fields should be filled up";
		}


 	?>


 <?php } ?>




<?php include_once 'includes/heading.php'; ?>
<?php include_once 'includes/navbar.php'; ?>


<section class="summary mt-5">
	<div class="container">
		<div class="row">
			<div class="col-10 offset-1">

				<h3 class="text-center mb-2">Add Assignment Marks</h3>
				<h4 class="text-center mb-2">Batch : <?php echo $batch; ?></h4>
				<h5 class="text-center mb-4">Course Name : <?php echo $course->course_name; ?></h5>

				<?php if (isset($error)): ?>
					 <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
							<?php echo $error; ?>
          	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
        	</div>

				<?php endif ?>

				<form method="post" class="needs-validation" novalidate>

					<div class="row">
						<div class="col-sm-3">
							<a target="_blank" class="btn btn-info form-control my-1 mr-sm-2 mb-4 text-center" href="view_assignment.php?course_id=<?php echo $course_id ?>&batch=<?php echo $batch ?> ">Assignment marks</a>

						</div>
						<div class="col-sm-6">
							  <select name="assignment_no" class="custom-select my-1 mr-sm-2 mb-4" id="inlineFormCustomSelectPref" required>
							    <option value="" selected>--- Select Assignment Number ---</option>
							    <option value="assignment_1">Assignment 1</option>
							    <option value="assignment_2">Assignment 2</option>
							    <option value="assignment_3">Assignment 3</option>
							    <option value="assignment_4">Assignment 4</option>
							    <option value="assignment_5">Assignment 5</option>
							  </select>
						</div>
					</div>

					<table class="table table-bordered table-hover">
					  <thead style="background-color: #B7CDDA;">
					    <tr class="text-center">
					      <th scope="col">Serial</th>
					      <th scope="col">Roll</th>
					      <th scope="col">Student Name</th>
					      <th scope="col">Assignment Marks</th>
					    </tr>
					  </thead>
					  <tbody>
							<?php
					  		$rows = $getFromU->viewStudentsForAttendence($batch);
					  		$i = 0;
					  		$table_name = "ass_".$batch."_".$course_id;;
					  		foreach ($rows as $row) {
					  			$roll = $row->roll;
					  			$student_name = $row->student_name;

					  			if ($getFromU->check_assignment_by_roll($batch, $roll, $course_id) === false) {
					  				$getFromU->create($table_name, array("roll" => $roll));
					  			}

					  			$i++
					  	?>

								<tr class="text-center">
						      <td><?php echo $i; ?></td>
						      <td><?php echo $roll; ?></td>
						      <td><?php echo $student_name; ?></td>
						      <td width="25%">
						      	<div class="col-sm-10 offset-1">
							      	<input type="number" step="any" class="form-control small" id="validationCustomUsername" name="assignment_marks[<?php echo $roll; ?>]"  aria-describedby="inputGroupPrepend" value="<?php echo $assignment_marks[$roll]; ?>" required>

						      	</div>


						      </td>
						    </tr>

							<?php } ?>
					  </tbody>
					</table>

					<div class="row">
						<div class="col-sm-5">
							<a href="tutorial.php?course_id=<?php echo $course_id; ?>&batch=<?php echo $batch; ?>"><button type="submit" class="btn btn-danger form-control mb-4" >Cancel</button></a>
						</div>
						<div class="col-sm-7">
							<a href=""><button type="submit" name="submit_assignment" class="btn btn-success form-control mb-4" >Submit</button></a>
						</div>
					</div>
				</form>


				<script>
					// Example starter JavaScript for disabling form submissions if there are invalid fields
					(function() {
					  'use strict';
					  window.addEventListener('load', function() {
					    // Fetch all the forms we want to apply custom Bootstrap validation styles to
					    var forms = document.getElementsByClassName('needs-validation');
					    // Loop over them and prevent submission
					    var validation = Array.prototype.filter.call(forms, function(form) {
					      form.addEventListener('submit', function(event) {
					        if (form.checkValidity() === false) {
					          event.preventDefault();
					          event.stopPropagation();
					        }
					        form.classList.add('was-validated');
					      }, false);
					    });
					  }, false);
					})();
				</script>

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