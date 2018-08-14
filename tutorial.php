<?php include_once 'includes/header.php'; ?>
<?php
	error_reporting(E_ERROR | E_PARSE);

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

			$getFromU->create_tutorial_table_by_batch_course_id($batch, $course_id);
		}
	}

?>

<?php
	if (isset($_POST['submit_tutorial']) ) {
		$tutorial_marks = $_POST['tutorial_marks'];

		//var_dump($tutorial_marks);

		$tutorial_no = $_POST['tutorial_no'];

		$batch     = $_GET['batch'];
		$course_id = $_GET['course_id'];

		if (!empty($tutorial_marks) && !empty($tutorial_no)) {
			$tutorial_no = $getFromU->checkInput($tutorial_no);


			$batch = $getFromU->checkInput($batch);
			$course_id = $getFromU->checkInput($course_id);

			$add_column = $getFromU->add_tutorial_column($tutorial_no, $batch, $course_id);


			foreach ($tutorial_marks as $tutu_key => $tutorial_mark) {

					if ($tutorial_mark >= 0 && $tutorial_mark <= 20) {
						$update_column = $getFromU->update_tutorial_column($tutorial_no, $batch, $course_id, $tutu_key, $tutorial_mark);
					}else {
						$error = "Tutorial marks must be in between 0-20";
					}

				}

				//header('Location: view_tutorial.php?course_id='.$course_id.'&batch='.$batch);

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

				<h3 class="text-center mb-2">Add Tutorial Marks</h3>
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


				<?php if (isset($tutu_msg)): ?>


				<?php endif ?>

				<form method="post" class="needs-validation" novalidate>

					<div class="row">
						<div class="col-sm-3">
							<a target="_blank" class=" btn btn-info form-control my-1 mr-sm-2 mb-4 text-center" href="view_tutorial.php?course_id=<?php echo $course_id ?>&batch=<?php echo $batch ?> ">Tutorial marks</a>

						</div>
						<div class="col-sm-6">
							  <select name="tutorial_no" class="custom-select my-1 mr-sm-2 mb-4" id="inlineFormCustomSelectPref" required>
							    <option value="" selected>--- Select Tutorial Number ---</option>
							    <option value="tutorial_1">Tutorial 1</option>
							    <option value="tutorial_2">Tutorial 2</option>
							    <option value="tutorial_3">Tutorial 3</option>
							    <option value="tutorial_4">Tutorial 4</option>
							    <option value="tutorial_5">Tutorial 5</option>
							  </select>
						</div>
					</div>

					<table class="table table-bordered table-hover">
					  <thead style="background-color: #B7CDDA;">
					    <tr class="text-center">
					      <th scope="col">Serial</th>
					      <th scope="col">Roll</th>
					      <th scope="col">Student Name</th>
					      <th scope="col">Tutorial Marks</th>
					    </tr>
					  </thead>
					  <tbody>
							<?php
					  		$rows = $getFromU->viewStudentsForAttendence($batch);
					  		$i = 0;
					  		$table_name = "t_".$batch."_".$course_id;;
					  		foreach ($rows as $row) {
					  			$roll = $row->roll;
					  			$student_name = $row->student_name;

					  			if ($getFromU->check_tutorial_by_roll($batch, $roll, $course_id) === false) {
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
							      	<input type="number" step="any" class="form-control small" id="validationCustomUsername" name="tutorial_marks[<?php echo $roll; ?>]"  aria-describedby="inputGroupPrepend" value="<?php echo $tutorial_marks[$roll]; ?>" required>
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
							<a href=""><button type="submit" name="submit_tutorial" class="btn btn-success form-control mb-4" >Submit</button></a>
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