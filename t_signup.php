<?php include_once 'includes/header.php'; ?>

<?php
	$name = "";
	$email = "";

	if (isset($_POST['signup_btn']) && !empty($_POST['signup_btn'])) {
		$name = $_POST['name'] ?? '';
		$role = $_POST['role'] ?? '';
		$email = $_POST['email'] ?? '';
		$teacher_code = $_POST['teacher_code'] ?? '';
		$password1 = $_POST['password1'] ?? '';
		$password2 = $_POST['password2'] ?? '';

		if (empty($name)) {
			$error = "Please Enter Your Name";
		}elseif (empty($role)) {
			$error = "Please Select Role";
		}elseif (empty($email)) {
			$error = "Please Enter Email";
		}elseif (empty($teacher_code)) {
			$error = "Please Enter Teacher Code";
		}elseif (empty($password1)) {
			$error = "Please Enter Password";
		}elseif (empty($password2)) {
			$error = "Please Re-Enter Password";
		}else {
			$name = $getFromU->checkInput($name);
			$role = $getFromU->checkInput($role);
			$email = $getFromU->checkInput($email);
			$teacher_code = $getFromU->checkInput(strtoupper($teacher_code));
			$password1 = $getFromU->checkInput($password1);
			$password2 = $getFromU->checkInput($password2);

			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$error = "Invalid Email Format";
			}elseif (strlen($name) < 6 || strlen($name) > 30) {
				$error = "Name must be in between 6-30 characters";
			}elseif (strlen($password1) < 5) {
				$error = "Password must be at-least 5 characters";
			}elseif ($password1 != $password1) {
				$error = "Password does not matched. Try Again !";
			}
			else {
				$checkTeacherRegistered = $getFromU->checkTeacher($teacher_code);
				if ($checkTeacherRegistered === true) {

					if ($getFromU->checkTeacherUser($teacher_code) === false) {
						$password = md5($password1);
						$user_id = $getFromU->create('users', array('name'=>$name,'role'=>"teacher", 'email'=>$email, 'teacher_code'=>$teacher_code, 'password'=>$password ));
						$_SESSION['user_id'] = $user_id;
						header("Location: login.php");
					}else {
						$error = "You are already registered";
					}

				}else {
					$error = "You are not eligible for Register";
				}

			}
		}


	}
?>






	<header class="home">
			<!-- Background Image -->
			<div class="bg-img" style="background-image: url('./assets/images/signup.jpg');">
				<div class="overlay"></div>
			</div>
			<!-- /Background Image -->

			<!-- home wrapper -->
			<div class="signup_section">
				<div class="container">
					<div class="row">
						<div class="col-md-6 offset-3 mt-5">
							<div class="card">
								<div class="card-header text-center h3">Teacher SignUp </div>
							  <div class="card-body">
							  	<?php if (isset($error)): ?>
							  		<div class="alert alert-danger text-center" role="alert">
											<?php echo $error; ?>
										</div>
							  	<?php endif ?>
									<form method="POST">
										<div class="form-group">
									    <label for="exampleFormControlInput1">Name :</label>
									    <input type="text" name="name" class="form-control" placeholder="Enter Name" value="<?php echo $name; ?>">
									  </div>
									  <div class="form-group">
									    <input type="hidden" name="role" value="teacher">
									  </div>

									  <!-- <div class="form-group">
									    <label for="exampleFormControlSelect1">Role :</label>
									    <select class="form-control" name="role" id="exampleFormControlSelect1">
									    	<option value="">--- Select Your Role ---</option>
									      <option value="student">Student</option>
									      <option value="teacher">Teacher</option>
									    </select>
									  </div> -->

									  <div class="form-group">
									    <label for="exampleFormControlInput1">Email address :</label>
									    <input type="email" name="email" class="form-control" placeholder="Enter Email Address" value="<?php echo $email; ?>">
									  </div>
									  <div class="form-group">
									    <label for="exampleFormControlInput1">Teacher Code :</label>
									    <input type="text" name="teacher_code" class="form-control" placeholder="Enter Teacher Code" value="<?php echo $teacher_code ?? ''; ?>">
									  </div>
									  <div class="form-group">
									    <label for="exampleFormControlInput1">Password :</label>
									    <input type="password" name="password1" class="form-control" placeholder="Enter Password">
									  </div>
									  <div class="form-group">
									    <label for="exampleFormControlInput1">Confirm Password :</label>
									    <input type="password" name="password2" class="form-control" placeholder="Confirm Password">
									  </div>
									  <input type="submit" name="signup_btn" class="btn btn-success form-control" value="Register">
									</form>
							  </div>
							  <div class="card-footer">
							  	Already Registered? <a href="login.php" class="btn btn-info btn-sm">Login</a>
							  </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /home wrapper -->
		</header>


<?php include_once 'includes/footer.php'; ?>
