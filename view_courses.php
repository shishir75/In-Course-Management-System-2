<?php include_once 'includes/header.php'; ?>
<?php
	if($getFromU->loggedIn() === false) {
		header("Location: index.php");
	}
?>



<?php
  $course_name = "";
  $teacher_code = "";

?>

<?php
  if (isset($_POST['add_course'])) {
    $course_id = $_POST['course_id'] ?? '';
    $course_name = $_POST['course_name'] ?? '';

    if (!empty($course_id) && !empty($course_name) && $teacher_code) {
      $course_id    = $getFromU->checkInput($course_id);
      $course_name  = $getFromU->checkInput($course_name);

      if (strlen($course_id) != 4) {
        $error = "Course ID must be in 4 Degit Number";
      }elseif (!preg_match('/^([a-zA-Z&\- ]+)$/',$course_name)) {
        $error = "Invaild Course Name";
      }else{
        $add_course = $getFromU->create('courses', array('course_id' => $course_id, 'course_name' => $course_name));
        //header('Location: view_courses.php?code='.substr($course_id, 0, 2));
      }

    }else {
      $error = "All fields are Required";
    }

  }



  if (isset($_GET['code'])) {
  	$code = $_GET['code'];
  	if (!empty($code)) {
  		$code = $getFromU->checkInput($code);
  	}
  }

  if (isset($_GET['course_id'])) {
  	$course_id = $_GET['course_id'];
  	if (!empty($course_id)) {
  		$course_id = $getFromU->checkInput($course_id);

  		$delete_course = $getFromU->delete('courses', $course_id);
  		$delete_msg = "Deleted";

  		header('Location: view_courses.php?code='.substr($course_id, 0, 2));



  	}
  }



?>








<?php include_once 'includes/heading.php'; ?>
<?php include_once 'includes/navbar.php'; ?>



<section class="summary mt-5">
	<div class="container">
		<div class="row">
			<div class="col-10 offset-1">
				<h2 class="text-center">View Courses</h2>
				<h4 class="text-center mb-5">Year : <?php echo substr($code, 0,1) ?>   Semester : <?php echo substr($code, 1,2) ?></h4>
					<?php if (isset($add_course)): ?>
						 <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            	<?php echo "Course Added Successfully"; ?>
            	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
          	</div>

					<?php endif ?>

					<?php if (isset($update_course)): ?>
	          <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
	            <?php echo $update_msg; ?>
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
	          </div>
        	<?php endif ?>

        	<?php if (isset($delete_course)): ?>
	          <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
	            <?php echo $delete_msg; ?>
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
					<?php include_once 'includes/add_course.php'; ?>
				<?php endif ?>


				<table class="table table-bordered table-hover">
				  <thead style="background-color: #B7CDDA">
				    <tr class="text-center">
				      <th scope="col">Serial</th>
				      <th scope="col">Course Code</th>
				      <th scope="col">Course Name</th>
				      <th scope="col">Actions</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php

				  		$rows = $getFromU->viewCourse($code);
				  		$i = 0;
							foreach ($rows as $row) {
								$course_id = $row->course_id;
								$course_name = $row->course_name;
								$i++;
						?>

							<tr class="text-center">
					      <th scope="row"><?php echo $i; ?></th>
					      <td><?php echo $course_id ?></td>
					      <td><?php echo $course_name ?></td>
					      <td class="text-center">
					      	<a href="course_details.php?course_id=<?php echo $course_id; ?>" class="btn btn-sm btn-info">View</a>
					      	<?php if ($getFromU->admin_only() === true): ?>
					      		<a href="course_update.php?course_id=<?php echo $course_id; ?>" class="btn btn-sm btn-warning">Update</a>
					      		<a href="view_courses.php?course_id=<?php echo $course_id; ?>" class="btn btn-sm btn-danger">Delete</a>
					      	<?php endif ?>

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