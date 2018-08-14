<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
  <div class="container">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="courses.php">Courses</a>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="batches.php">Batches</a>
        </li>

        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Courses
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">1<sup>st</sup> Year 1<sup>st</sup> Semester</a>
            <a class="dropdown-item" href="#">1<sup>st</sup> Year 2<sup>nd</sup> Semester</a>
            <a class="dropdown-item" href="#">2<sup>nd</sup> Year 1<sup>st</sup> Semester</a>
            <a class="dropdown-item" href="#">2<sup>nd</sup> Year 2<sup>nd</sup> Semester</a>
            <a class="dropdown-item" href="#">3<sup>rd</sup> Year 1<sup>st</sup> Semester</a>
            <a class="dropdown-item" href="#">3<sup>rd</sup> Year 2<sup>nd</sup> Semester</a>
            <a class="dropdown-item" href="#">4<sup>th</sup> Year 1<sup>st</sup> Semester</a>
            <a class="dropdown-item" href="#">4<sup>th</sup> Year 2<sup>nd</sup> Semester</a>
          </div>
        </li> -->

        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Batch
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">5<sup>th</sup> Batch</a>
            <a class="dropdown-item" href="#">6<sup>th</sup> Batch</a>
            <a class="dropdown-item" href="#">7<sup>th</sup> Batch</a>
            <a class="dropdown-item" href="#">8<sup>th</sup> Batch</a>
            <a class="dropdown-item" href="#">9<sup>th</sup> Batch</a>

          </div>
        </li> -->

        <?php if ($getFromU->admin_and_teacher_only() === true): ?>
          <li class="nav-item active">
            <a class="nav-link" href="teachers.php">Teachers</a>
          </li>
        <?php endif ?>

        <?php if ($getFromU->admin_only() === true): ?>
          <li class="nav-item active">
          <a class="nav-link" href="students.php">Students</a>
        </li>
        <?php endif ?>



        <li class="nav-item active">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>


      <?php
        $user_id = $_SESSION['user_id'];
        $user = $getFromU->view_user_by_user_id($user_id);


      ?>

      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link"><?php echo $user->name; ?><i class="fas fa-user ml-2"></i></a>
        </li>
      </ul>





    </div>
  </div>
</nav>