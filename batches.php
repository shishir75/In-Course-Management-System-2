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
		<h3 class="text-center mb-4">All Batches</h3>
		<div class="row">
			<div class="col-md-4 col-sm-6 mb-4">
				<div class="card">
				  <h5 class="card-header text-center">42<sup>th</sup> Batch</h5>
				  <div class="card-body">
				    <h5 class="card-text text-center">IIT-4<sup>th</sup> Batch</h5>
				    <h6 class="card-text text-center">2012-13 Session</h6>
				    <a href="view_students.php?batch=42" class="btn btn-info form-control">Details</a>
				  </div>
				</div>
			</div>

			<div class="col-md-4 col-sm-6 mb-4">
				<div class="card">
				  <h5 class="card-header text-center">43<sup>th</sup> Batch</h5>
				  <div class="card-body">
				    <h5 class="card-text text-center">IIT-5<sup>th</sup> Batch</h5>
				    <h6 class="card-text text-center">2013-14 Session</h6>
				    <a href="view_students.php?batch=43" class="btn btn-info form-control">Details</a>
				  </div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 mb-4">
				<div class="card">
				  <h5 class="card-header text-center">44<sup>th</sup> Batch</h5>
				  <div class="card-body">
				    <h5 class="card-text text-center">IIT-6<sup>th</sup> Batch</h5>
				    <h6 class="card-text text-center">2014-15 Session</h6>
				    <a href="view_students.php?batch=44" class="btn btn-info form-control">Details</a>
				  </div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 mb-4">
				<div class="card">
				  <h5 class="card-header text-center">45<sup>th</sup> Batch</h5>
				  <div class="card-body">
				    <h5 class="card-text text-center">IIT-7<sup>th</sup> Batch</h5>
				    <h6 class="card-text text-center">2015-16 Session</h6>
				    <a href="view_students.php?batch=45" class="btn btn-info form-control">Details</a>
				  </div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 mb-4">
				<div class="card">
				  <h5 class="card-header text-center">46<sup>th</sup> Batch</h5>
				  <div class="card-body">
				    <h5 class="card-text text-center">IIT-8<sup>th</sup> Batch</h5>
				    <h6 class="card-text text-center">2016-17 Session</h6>
				    <a href="view_students.php?batch=46" class="btn btn-info form-control">Details</a>
				  </div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 mb-4">
				<div class="card">
				  <h5 class="card-header text-center">47<sup>th</sup> Batch</h5>
				  <div class="card-body">
				    <h5 class="card-text text-center">IIT-9<sup>th</sup> Batch</h5>
				    <h6 class="card-text text-center">2017-18 Session</h6>
				    <a href="view_students.php?batch=47" class="btn btn-info form-control">Details</a>
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