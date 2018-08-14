<?php include_once 'includes/header.php'; ?>
<?php
	if($getFromU->loggedIn() === false) {
		header("Location: index.php");
	}elseif ($getFromU->admin_only() === false) {
		header("Location: index.php");
	}
?>

<?php
	if (isset($_POST['add_single_student'])) {
		$roll 				= $_POST['roll'];
		$student_name = $_POST['student_name'];
		$batch 				= $_POST['batch'];

		if (!empty($roll) && !empty($student_name) && !empty($batch)) {
			$roll = $getFromU->checkInput($roll);
			$student_name = $getFromU->checkInput(ucwords($student_name));
			$batch = $getFromU->checkInput($batch);

			if (strlen($roll) != 4 ) {
				$error = "Roll Number must be 4 Digit Number";
			}elseif (strlen($batch) != 2 ) {
				$error = "Batch must be 2 Digit Number";
			}elseif (!preg_match('/^([a-zA-Z. ]+)$/',$student_name)) {
				$error = "Only Letters & space are allowed for student name";
			}elseif ($getFromU->checkStudent($roll, $batch) === true) {
				$error = "Student Already Exits";
			}

			else{
				$add_single_student =	$getFromU->create("students", array('roll' => $roll, 'student_name' => $student_name, 'batch' => $batch));
				if ($add_single_student) {
					$add_single_msg = "One Student Added Successfully";
				}
			}

		}else {
			$error = "All Fields are Required";
		}

	}
?>













<?php include_once 'includes/heading.php'; ?>
<?php include_once 'includes/navbar.php'; ?>
<?php include_once 'includes/add_single_student.php'; ?>
<?php include_once 'includes/add_multiple_students.php'; ?>




<section class="summary mt-5">
	<div class="container">

		<h3 class="text-center mb-5">Students Log</h3>

		<?php if (isset($add_single_student)): ?>
			<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
	    	<?php echo "One Student Added Successfully"; ?>
	    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
	  	</div>

		<?php endif ?>


		<?php
			if (isset($_POST['add_multiple_students']))
			{
				$file=$_FILES["csv_file"]["name"];
				$tmp_name=$_FILES["csv_file"]["tmp_name"];
				$path="uploads/".$file;
				$file1=explode(".",$file);
				$ext=$file1[1] ?? '';
				$allowed=array("csv");

				if (empty($file)) {
					$error = "Please Insert a CSV File";
				}else {

					if(in_array($ext,$allowed))
					{
					 	move_uploaded_file($tmp_name,$path);
					?>

					<div class="alert alert-success alert-dismissible fade show text-center" role="alert">

						<?php $add_csv = $getFromU->import($file); ?>

			    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
			  	</div>

					<?php
					}else {
						$error = "Invalid Format";
					}

				}

			}
		?>











		<?php if (isset($error)): ?>
			<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
	    	<?php echo $error; ?>
	    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
	  	</div>

		<?php endif ?>



		<div class="row">
			<div class="col-md-4 col-sm-6 mb-4">
				<div class="card">
				  <h5 class="card-header text-center">View Student</h5>
				  <div class="card-body">
				    <h6 class="card-text text-center">You can view students according to Batch by Batch</h6>
				    <a href="batches.php" class="btn btn-info form-control">View All</a>
				  </div>
				</div>
			</div>

			<div class="col-md-4 col-sm-6 mb-4">
				<div class="card">
				  <h5 class="card-header text-center">Add Single Student</h5>
				  <div class="card-body">
				    <h6 class="card-text text-center">You can add single student through an input field</h6>
				    <button type="button" class="btn btn-info form-control" data-toggle="modal" data-target="#exampleModalCenter1">Add Single</button>
				  </div>
				</div>
			</div>

			<div class="col-md-4 col-sm-6 mb-4">
				<div class="card">
				  <h5 class="card-header text-center">Add Multiple Students</h5>
				  <div class="card-body">
				    <h6 class="card-text text-center">You can add muliple students through excel file in csv format</h6>
				    <button type="button" class="btn btn-info form-control" data-toggle="modal" data-target="#exampleModalCenter2">Add Multiple Students</button>
				  </div>
				</div>
			</div>






		</div>
	</div>
</section>







<footer class="footer fixed-bottom">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 offset-2">
				<p>Copyright: &copy IIT-6<sup>th</sup> Batch, JU</p>
			</div>
		</div>
	</div>
</footer>







<?php include 'includes/footer.php'; ?>