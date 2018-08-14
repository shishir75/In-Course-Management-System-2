<?php include_once 'includes/header.php'; ?>

<?php
	if (isset($_POST['login_btn']) && !empty($_POST['login_btn'])) {
		$email = $_POST['email'] ?? '';
		$password = $_POST['password'] ?? '';

		if (!empty($email) && !empty($password)) {
			$email    = $getFromU->checkInput($email);
			$password = $getFromU->checkInput($password);

			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$error = "Invalid Email format";
			}else {
				if ($getFromU->login($email, $password) === false){
					$error = "Email OR Password is Incorrect";
				}
			}


		}else {
			$error = "Plaese Enter Email &amp Password";
		}


	}




?>




	<header class="home">
			<!-- Background Image -->
			<div class="bg-img" style="background-image: url('./assets/images/login.jpg');">
				<div class="overlay"></div>
			</div>
			<!-- /Background Image -->

			<!-- home wrapper -->
			<div class="login_section">
				<div class="container">
					<div class="row">
						<div class="col-6 offset-3">
							<div class="card">
								<div class="card-header text-center h3"> Login </div>
							  <div class="card-body">
							  	<?php if (isset($error)): ?>
											<div class="alert alert-danger" role="alert">
												 <?php echo $error; ?>
											</div>
							  	<?php endif ?>
									<form method="POST">
									  <div class="form-group">
									    <label for="exampleFormControlInput1">Email address</label>
									    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter Email Address">
									  </div>
									   <div class="form-group">
									    <label for="exampleFormControlInput1">Password</label>
									    <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="Enter Password">
									  </div>
									  <input type="submit" name="login_btn" class="btn btn-success form-control" value="Login">
									</form>
							  </div>
							  <div class="card-footer">
							  	<div class="row">
							  		<div class="col-sm-3"><a href="t_signup.php" class="btn btn-info btn-sm">Teacher SignUp</a></div>
							  		<div class="col-sm-6"><p class="text-center">Not Registered?</p> </div>
							  		<div class="col-sm-3"><a href="signup.php" class="btn btn-info btn-sm">Student SignUp</a> </div>
							  	</div>



							  </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /home wrapper -->
		</header>


<?php include_once 'includes/footer.php'; ?>
