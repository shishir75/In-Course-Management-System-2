<?php include_once 'includes/header.php'; ?>
<?php
	if($getFromU->loggedIn() === false) {
		header("Location: index.php");
	}elseif ($getFromU->admin_and_teacher_only() === false) {
		header("Location: index.php");
	}
?>

<?php

	if (isset($_GET['delete_teacher'])) {
		$teacher_code = $_GET['delete_teacher'];
		if (!empty($teacher_code)) {
			$teacher_code = $getFromU->checkInput($teacher_code);
			$result = $getFromU->t_delete('teachers', $teacher_code);

				$delete_msg = "Teacher Deleted Successfully";


		}
	}


?>







<?php include_once 'includes/heading.php'; ?>
<?php include_once 'includes/navbar.php'; ?>


<section class="summary mt-5">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h3 class="	text-center mb-5">Teacher's List</h3>
			</div>
			<div class="col-md-8 offset-2">
				<?php if (isset($add_teacher)): ?>
				<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
					<?php echo $t_add_msg; ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php endif ?>

			<?php if (isset($delete_msg)): ?>
				<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
					<?php echo $delete_msg; ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php endif ?>
			</div>

			<?php if ($getFromU->admin_only() === true): ?>
				<div class="col-12 mt-2 mb-4">
					<a href="add_teacher.php" class="btn btn-sm btn-primary">Add Teacher</a>
				</div>
			<?php endif ?>



			<?php
				$teachers = $getFromU->viewTeachers();
				foreach ($teachers as $teacher) {
					$teacher_code = $teacher->teacher_code;
					$teacher_name = $teacher->teacher_name;
					$t_position = $teacher->t_position;
					$t_speciality = $teacher->t_speciality;
					$t_profileImage = $teacher->t_profileImage;

			?>

				<div class="col-md-3 col-sm-6 mb-4">
					<div class="card">
					  <img class="card-img-top" src="uploads/<?php echo $t_profileImage; ?>" alt="Card image cap" style="height: 180px;">
					  <div class="card-body text-center">
					    <h5 class="card-title"><?php echo $teacher_name; ?></h5>
					    <h6 class="card-title"><?php echo $t_position; ?></h6>
					    <p class="card-text"><?php echo $t_speciality; ?></p>
					    <div class="row">
					    	<div class="col-12">
					    		<a href="view_teacher.php?t_code=<?php echo $teacher_code; ?>" class="btn btn-sm btn-info form-control mb-3">View</a>
					    	</div>

					    	<?php if ($getFromU->admin_only() === true || $_SESSION['teacher_code'] == $teacher_code): ?>
					    		<div class="col-md-6">
										<a href="teacher_update.php?t_code=<?php echo $teacher_code ?>" class="btn btn-sm btn-warning form-control">Update</a>
						   		</div>
							    <div class="col-md-6">
							    	<a href="teachers.php?delete_teacher=<?php echo $teacher_code; ?>" class="btn btn-sm btn-danger form-control">Delete</a>
							    </div>
					    	<?php endif ?>

					    </div>
					  </div>
					</div>
				</div>

			<?php } ?>


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