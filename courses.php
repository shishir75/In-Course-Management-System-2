<?php include_once 'includes/header.php'; ?>
<?php
	if($getFromU->loggedIn() === false) {
		header("Location: index.php");
	}
?>

<?php include_once 'includes/heading.php'; ?>
<?php include_once 'includes/navbar.php'; ?>





<section class="summary mt-5">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-6 mb-4">
				<div class="card">
				  <h5 class="card-header text-center">1-1</h5>
				  <div class="card-body">
				    <h5 class="card-title text-center">1<sup>st</sup> Year 1<sup>st</sup> Semester</h5>
				    <a href="view_courses.php?code=11" class="btn btn-info form-control">Details</a>
				  </div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 mb-4">
				<div class="card">
				  <h5 class="card-header text-center">1-2</h5>
				  <div class="card-body">
				    <h5 class="card-title text-center">1<sup>st</sup> Year 2<sup>nd</sup> Semester</h5>
				    <a href="view_courses.php?code=12" class="btn btn-info form-control">Details</a>
				  </div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 mb-4">
				<div class="card">
				  <h5 class="card-header text-center">2-1</h5>
				  <div class="card-body">
				    <h5 class="card-title text-center">2<sup>nd</sup> Year 1<sup>st</sup> Semester</h5>
				    <a href="view_courses.php?code=21" class="btn btn-info form-control">Details</a>
				  </div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 mb-4">
				<div class="card">
				  <h5 class="card-header text-center">2-2</h5>
				  <div class="card-body">
				    <h5 class="card-title text-center">2<sup>nd</sup> Year 2<sup>nd</sup> Semester</h5>
				    <a href="view_courses.php?code=22" class="btn btn-info form-control">Details</a>
				  </div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 mb-4">
				<div class="card">
				  <h5 class="card-header text-center">3-1</h5>
				  <div class="card-body">
				    <h5 class="card-title text-center">3<sup>rd</sup> Year 1<sup>st</sup> Semester</h5>
				    <a href="view_courses.php?code=31" class="btn btn-info form-control">Details</a>
				  </div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 mb-4">
				<div class="card">
				  <h5 class="card-header text-center">3-2</h5>
				  <div class="card-body">
				    <h5 class="card-title text-center">3<sup>rd</sup> Year 2<sup>nd</sup> Semester</h5>
				    <a href="view_courses.php?code=32" class="btn btn-info form-control">Details</a>
				  </div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 mb-4">
				<div class="card">
				  <h5 class="card-header text-center">4-1</h5>
				  <div class="card-body">
				    <h5 class="card-title text-center">4<sup>th</sup> Year 1<sup>st</sup> Semester</h5>
				    <a href="view_courses.php?code=41" class="btn btn-info form-control">Details</a>
				  </div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 mb-4">
				<div class="card">
				  <h5 class="card-header text-center">4-2</h5>
				  <div class="card-body">
				    <h5 class="card-title text-center">4<sup>th</sup> Year 2<sup>nd</sup> Semester</h5>
				    <a href="view_courses.php?code=42" class="btn btn-info form-control">Details</a>
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