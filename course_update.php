<?php include_once 'includes/header.php'; ?>
<?php
	if($getFromU->loggedIn() === false) {
		header("Location: index.php");
	}
?>

<?php
	if (isset($_GET['course_id'])) {
		$course_id = $_GET['course_id'];
		if (!empty($course_id)) {
			$course_id = $getFromU->checkInput($course_id);

			$row = $getFromU->viewCourseById($course_id);

			//$course_id = $row->course_id;
			$course_name = $row->course_name;

		}
	}
?>

<?php
  if (isset($_POST['update_course'])) {
    //$course_id = $_POST['course_id'] ?? '';
    $course_name = $_POST['course_name'] ?? '';

    if (!empty($course_name)) {
      //$course_id    = $getFromU->checkInput($course_id);
      $course_name  = $getFromU->checkInput($course_name);

      if (!preg_match('/^([a-zA-Z& ]+)$/',$course_name)) {
        $error = "Invaild Course Name";
      }else{
        $update_course = $getFromU->update('courses', $course_id ,array('course_name' => $course_name));
        $update_msg = "Course Updated Successfully";
        header('Location: view_courses.php?code='.substr($course_id, 0, 2));

      }

    }else {
      $error = "Course Name can\'t be empty";
    }

  }

?>













<?php include_once 'includes/heading.php'; ?>
<?php include_once 'includes/navbar.php'; ?>



<section class="summary mt-5">
	<div class="container">
		<div class="row">
			<div class="col-8 offset-2">
				<h2 class="text-center">Update Course</h2>


					<?php if (isset($error)): ?>
	          <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
	            <?php echo $error; ?>
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
	          </div>
        	<?php endif ?>



					<form method="post" class="needs-validation" novalidate>
          <div class="form-row">
           <!--  <div class="col-12">
              <label>Course ID</label>
              <input type="number" name="course_id" class="form-control"  placeholder="Enter Course Code" required value="<?php echo $course_id; ?>">
              <div class="invalid-feedback">
                Please provide a valid Course Code.
              </div>
            </div> -->
            <div class="col-12 mt-2">
              <label>Course Name</label>
              <input type="text" name="course_name" class="form-control" placeholder="Enter Course Name" required value="<?php echo $course_name; ?>">
              <div class="invalid-feedback">
                Please provide a valid Course Name.
              </div>
            </div>


          </div>

         <button type="submit" name="update_course" class="btn btn-primary form-control mt-3">Update Course</button>
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