<?php include_once 'includes/header.php'; ?>
<?php
	if($getFromU->loggedIn() === false) {
		header("Location: index.php");
	}
?>

<?php include_once 'includes/heading.php'; ?>
<?php include_once 'includes/navbar.php'; ?>



<section class="about_section">
	<div class="container-fluid">
	<div class="row">
		<div class="col-8 offset-2 text-center">
			<h3>About Project</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis molestias qui ipsum, autem laudantium? Repellendus quis molestias accusamus aperiam eum assumenda doloremque magnam enim, consectetur architecto, optio. Deleniti ducimus quaerat eos quam doloribus, minima vel, laboriosam itaque quidem veniam laborum ex veritatis beatae ut magnam, ipsa tempora debitis. Aspernatur, at!</p>
		</div>
	</div>
</div>
</section>


<section class="summary mt-5">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-6 mb-4">
				<div class="card">
				  <h5 class="card-header text-center">Teacher's Panel</h5>
				  <div class="card-body">
				    <h5 class="card-title">Special title treatment</h5>
				    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
				    <a href="teachers.php" class="btn btn-info form-control">Go somewhere</a>
				  </div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 mb-4">
				<div class="card">
				  <h5 class="card-header text-center">Student's Panel</h5>
				  <div class="card-body">
				    <h5 class="card-title">Special title treatment</h5>
				    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
				    <a href="batches.php" class="btn btn-info form-control">Go somewhere</a>
				  </div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 mb-4">
				<div class="card">
				  <h5 class="card-header text-center">Courses</h5>
				  <div class="card-body">
				    <h5 class="card-title">Special title treatment</h5>
				    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
				    <a href="courses.php" class="btn btn-info form-control">Go somewhere</a>
				  </div>
				</div>
			</div>


		</div>
	</div>
</section>


<section class="team_section">
	<div class="container-fluid">
	<div class="row">
		<div class="col-8 offset-2 text-center">
			<h3>Project Team</h3>
		</div>
	</div>
</div>
</section>


<section class="team_members mt-4">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-6">
				<div class="card" style="width: 18rem;">
					<img class="card-img-top" src="assets/images/kawsar.jpg" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">Md. Kawsar Ahmed</h5>
						<p class="card-text">Class Roll: 1696</p>
						<p class="card-text">Exam Roll: 152411</p>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-6">
								<button class="btn btn-info form-control"><a href="#" class="card-link text-white">Facebook</a></button>
							</div>
							<div class="col-sm-6">
								<button class="btn btn-info form-control"><a href="#" class="card-link text-white">Gmail</a></button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="card" style="width: 18rem;">
					<img class="card-img-top" src="assets/images/maruf.jpg" alt="Card image cap" style="height: 285px;">
					<div class="card-body">
						<h5 class="card-title">Md. Maruf Hosen</h5>
						<p class="card-text">Class Roll: 1704</p>
						<p class="card-text">Exam Roll: 152419</p>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-6">
								<button class="btn btn-info form-control"><a href="#" class="card-link text-white">Facebook</a></button>
							</div>
							<div class="col-sm-6">
								<button class="btn btn-info form-control"><a href="#" class="card-link text-white">Gmail</a></button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="card" style="width: 18rem;">
					<img class="card-img-top" src="assets/images/mee.jpg" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">Md. Obydullah Sarder</h5>
						<p class="card-text">Class Roll: 1708</p>
						<p class="card-text">Exam Roll: 152423</p>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-6">
								<button class="btn btn-info form-control"><a href="#" class="card-link text-white">Facebook</a></button>
							</div>
							<div class="col-sm-6">
								<button class="btn btn-info form-control"><a href="#" class="card-link text-white">Gmail</a></button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="card" style="width: 18rem;">
					<img class="card-img-top" src="assets/images/jewel.jpg" alt="Card image cap" style="height: 285px;">
					<div class="card-body">
						<h5 class="card-title">S. M. Pervez Jewel</h5>
						<p class="card-text">Class Roll: 2106</p>
						<p class="card-text">Exam Roll: 152441</p>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-6">
								<button class="btn btn-info form-control"><a href="#" class="card-link text-white">Facebook</a></button>
							</div>
							<div class="col-sm-6">
								<button class="btn btn-info form-control"><a href="#" class="card-link text-white">Gmail</a></button>
							</div>
						</div>
					</div>
				</div>
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