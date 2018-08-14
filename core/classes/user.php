<?php

	class User
	{
    protected $pdo;
    protected $state_csv = false;
    public function __construct($pdo)
    {
      $this->pdo = $pdo;
    }

    public function checkInput($var)
    {
    	$var = htmlspecialchars($var);
    	$var = trim($var);
    	$var = stripcslashes($var);
    	return $var;
    }

    public function search($search)
    {
      $sql = "SELECT * FROM students WHERE student_name LIKE ? OR roll LIKE ?";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(1, '%'.$search.'%', PDO::PARAM_STR);
      $stmt->bindValue(2, '%'.$search.'%', PDO::PARAM_INT);
      $stmt->execute();
      return $stmt->fetchAll();
    }



    public function login($email, $password)
    {
    	$password = md5($password);
    	$sql = "SELECT * FROM users WHERE email = :email AND password = :password";
    	$stmt = $this->pdo->prepare($sql);
    	$stmt->bindParam(":email", $email, PDO::PARAM_STR);
    	$stmt->bindParam(":password", $password, PDO::PARAM_STR);
    	$stmt->execute();

    	$user = $stmt->fetch();
    	$count = $stmt->rowCount();
    	if ($count > 0) {
        $_SESSION['user_id'] = $user->user_id;
        $batch = $user->batch;
        $roll = $user->roll;
        $teacher_code = $user->teacher_code;

    		if ($user->role == "admin") {
          $_SESSION['role'] = $user->role;
    			header("Location: home.php");

    		}elseif ($user->role == "teacher") {
          $_SESSION['role'] = $user->role;
          $_SESSION['teacher_code'] = $user->teacher_code;
          header("Location: view_teacher.php?t_code=".$teacher_code);

        }elseif ($user->role == "student") {
          $_SESSION['role'] = $user->role;
          header("Location: view_students.php?batch=".$batch);
        }


    	}else {
    		return false;
    	}
    }

  	public function create($table, $fields = array())
  	{
  		$columns = implode(',', array_keys($fields));
  		$values  = ':'.implode(', :', array_keys($fields));
  		$sql = "INSERT INTO {$table} ({$columns}) VALUES({$values})";
  		$stmt = $this->pdo->prepare($sql);

  		if ($stmt) {
  			foreach ($fields as $key => $data) {
  				$stmt->bindValue(':'.$key, $data);
  			}
  			$stmt->execute();
  			return $this->pdo->lastInsertId();
  		}
  	}


  	public function loggedIn()
  	{
  		return (isset($_SESSION['user_id'])) ? true : false;
  	}

    public function admin_only()
    {
        return ($_SESSION['role'] === "admin" ) ? true : false;
    }

    public function specefic_teacher_and_admin_only()
    {
        return ($_SESSION['teacher_code'] === $user->teacher_code) ? true : false;
    }

    public function teacher_only()
    {
        return ($_SESSION['role'] === "teacher" ) ? true : false;
    }



    public function student_only()
    {
        return ($_SESSION['role'] === "student" ) ? true : false;
    }


    public function admin_and_teacher_only()
    {
        return ($_SESSION['role'] === "admin" || $_SESSION['role'] === "teacher" ) ? true : false;
    }


  	public function logout()
  	{
  		$_SESSION = array();
  		session_destroy();
  		header("Location: ".BASE_URL."index.php");
  	}


      public function view_user_by_user_id($user_id)
      {
          $sql = "SELECT * FROM users WHERE user_id = :user_id";
          $stmt = $this->pdo->prepare($sql);
          $stmt->bindValue(":user_id", $user_id);
          $stmt->execute();
          return $stmt->fetch();
      }

  	public function viewCourses()
  	{
  		$sql = "SELECT * FROM courses ORDER BY course_id";
  		$stmt = $this->pdo->prepare($sql);
  		$stmt->execute();

  		return $stmt->fetchAll();
  	}

  	public function viewBatches()
  	{
  		$sql = "SELECT DISTINCT batch FROM students ORDER BY batch";
  		$stmt = $this->pdo->prepare($sql);
  		$stmt->execute();

  		return $stmt->fetchAll();
  	}

		public function viewCourse($code)
		{
			$sql = "SELECT * FROM courses WHERE course_id LIKE :code";
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindValue(":code", $code."%");
			$stmt->execute();

			return $stmt->fetchAll();
		}


		public function viewTeachers()
		{
			$sql = "SELECT * FROM teachers";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();

			return $stmt->fetchAll();
		}

		public function viewCourseById($course_id)
		{
			$sql = "SELECT * FROM courses WHERE course_id = :course_id";
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindValue(":course_id", $course_id);
			$stmt->execute();

			return $stmt->fetch();
		}


		public function viewTeacherByCode($teacher_code)
		{
			$sql = "SELECT * FROM teachers WHERE teacher_code = :teacher_code";
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindValue(":teacher_code", $teacher_code);
			$stmt->execute();

			return $stmt->fetch();
		}

		public function viewStudentsByBatch($batch)
		{
			$sql = "SELECT * FROM students WHERE batch = :batch ORDER BY roll";
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindValue(":batch", $batch);
			$stmt->execute();

			return $stmt->fetchAll();
		}


        public function viewStudentsById($student_id)
        {
            $sql = "SELECT * FROM students WHERE student_id = :student_id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":student_id", $student_id);
            $stmt->execute();

            return $stmt->fetch();
        }


        public function view_batch_teacher_code_by_course_id($course_id)
        {
            $sql = "SELECT batch, teacher_code FROM course_by_teacher_batch WHERE course_id = :course_id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":course_id", $course_id);
            $stmt->execute();

            return $stmt->fetchAll();
        }


        public function view_teacher_code_by_course_id_batch($course_id, $batch)
        {
            $sql = "SELECT teacher_code FROM course_by_teacher_batch WHERE course_id = :course_id AND batch = :batch";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":course_id", $course_id);
            $stmt->bindValue(":batch", $batch);
            $stmt->execute();

            return $stmt->fetch();
        }


        public function view_course_id_teacher_code_by_batch($batch)
        {
            $sql = "SELECT course_id, teacher_code FROM course_by_teacher_batch WHERE batch = :batch ORDER BY course_id DESC";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":batch", $batch);
            $stmt->execute();

            return $stmt->fetchAll();
        }



        public function view_attendene_column_by_batch_course_id($batch, $course_id)
        {
            $table_name = $batch."_".$course_id;

            $sql = "SHOW COLUMNS FROM `{$table_name}` LIKE '%20%'";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        }


        public function view_tutorial_column_by_batch_course_id($batch, $course_id)
        {
            $table_name = "t_".$batch."_".$course_id;

            $sql = "SHOW COLUMNS FROM `{$table_name}` LIKE 'Tutorial_%'";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        }


        public function view_assignment_column_by_batch_course_id($batch, $course_id)
        {
            $table_name = "ass_".$batch."_".$course_id;

            $sql = "SHOW COLUMNS FROM `{$table_name}` LIKE 'Assignment_%'";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        }


        public function view_attendene_by_roll($batch, $course_id , $roll, $att_date)
        {
            $table_name = $batch."_".$course_id;

            $sql = "SELECT `$att_date` FROM `{$table_name}` WHERE roll = :roll";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":roll", $roll);
            $stmt->execute();

            return $stmt->fetchAll();
        }


        public function view_all_attendene_by_roll($batch, $course_id , $roll)
        {
            $table_name = $batch."_".$course_id;

            $sql = "SELECT * FROM `{$table_name}` WHERE roll = :roll";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":roll", $roll);
            $stmt->execute();

            $marks = $stmt->fetch(PDO::FETCH_NUM);
            return $marks;
        }





        public function view_tutorial_by_roll($batch, $course_id , $roll)
        {
            $table_name = "t_".$batch."_".$course_id;

            $sql = "SELECT * FROM `{$table_name}` WHERE roll = :roll";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":roll", $roll);
            $stmt->setFetchMode(PDO::FETCH_NUM);
            $stmt->execute();

            $marks = $stmt->fetch();
            return $marks;
        }

        public function view_tutorial_by_roll2($batch, $course_id , $roll)
        {
            $table_name = "t_".$batch."_".$course_id;

            $sql = "SELECT * FROM `{$table_name}` WHERE roll = :roll";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":roll", $roll);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $stmt->execute();

            $marks = $stmt->fetchAll();
            return $marks;
        }




         public function view_assignment_by_roll($batch, $course_id , $roll)
        {
            $table_name = "ass_".$batch."_".$course_id;

            //$sql = "SELECT `$tutorial_no` FROM `{$table_name}` WHERE roll = :roll";
            $sql = "SELECT * FROM `{$table_name}` WHERE roll = :roll";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":roll", $roll);
            $stmt->execute();

            $marks = $stmt->fetch(PDO::FETCH_NUM);
            return $marks;
        }

         public function view_assignment_by_roll2($batch, $course_id , $roll)
        {
            $table_name = "ass_".$batch."_".$course_id;

            //$sql = "SELECT `$tutorial_no` FROM `{$table_name}` WHERE roll = :roll";
            $sql = "SELECT * FROM `{$table_name}` WHERE roll = :roll";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":roll", $roll);
            $stmt->execute();

            $marks = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $marks;
        }


        public function count_total_student_by_batch($batch)
        {
            $sql = "SELECT student_id FROM students WHERE batch = :batch";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":batch", $batch);
            $stmt->execute();

            $number = $stmt->fetchAll();
            return $count = count($number);

        }


        public function count_number_of_class_taken($batch, $course_id)
        {
            $table_name = $batch."_".$course_id;

            $sql = "DESCRIBE $table_name";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            $number = $stmt->fetchAll();
            return $count = count($number);

        }


        public function count_number_of_tutorial_taken($batch, $course_id)
        {
            $table_name = "t_".$batch."_".$course_id;

            $sql = "DESCRIBE $table_name";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            $number = $stmt->fetchAll();
            return $count = count($number);

        }


        public function count_number_of_assignment_taken($batch, $course_id)
        {
            $table_name = "ass_".$batch."_".$course_id;

            $sql = "DESCRIBE $table_name";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            $number = $stmt->fetchAll();
            return $count = count($number);

        }




		public function viewStudentsForAttendence($batch)
		{
			$sql = "SELECT s.roll, s.student_name FROM students AS s WHERE s.batch = :batch ORDER BY roll";
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindValue(":batch", $batch);
			$stmt->execute();

			return $stmt->fetchAll();
		}


		public function viewTeaherDetailsByCode($teacher_code)
		{
			$sql = "SELECT course_id, course_name, batch FROM courses WHERE teacher_code = :teacher_code ORDER BY course_id";
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindValue(":teacher_code", $teacher_code);
			$stmt->execute();

			return $stmt->fetchAll();
		}


		public function teacher_course_join($teacher_code)
		{
			$sql = "SELECT ctb.course_id, ctb.batch, c.course_name FROM course_by_teacher_batch AS ctb LEFT JOIN courses AS c ON ctb.course_id = c.course_id WHERE ctb.teacher_code = :teacher_code ORDER BY ctb.batch DESC, ctb.course_id DESC";
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindValue(":teacher_code", $teacher_code);
			$stmt->execute();

			return $stmt->fetchAll();
		}



		public function update($table, $course_id, $fields = array())
        {
          $columns = '';
          $i       = 1;
          foreach ($fields as $name => $value) {
              $columns .= "{$name} = :{$name}";
              if ($i < count($fields)) {
                  $columns .= ', ';
              }
              $i++;
          }

            $sql = "UPDATE {$table} SET {$columns} WHERE course_id = {$course_id}";
            $stmt = $this->pdo->prepare($sql);
            if ($stmt) {
                foreach ($fields as $key => $value) {
                    $stmt->bindValue(":".$key, $value);
                }
               	$stmt->execute();

            }
        }


    public function t_update($table, $teacher_code, $fields = array())
    {
      $columns = '';
      $i       = 1;
      foreach ($fields as $name => $value) {
          $columns .= "{$name} = :{$name}";
          if ($i < count($fields)) {
              $columns .= ', ';
          }
          $i++;
      }

        $sql = "UPDATE {$table} SET {$columns} WHERE teacher_code = {$teacher_code}";
        $stmt = $this->pdo->prepare($sql);
        if ($stmt) {
            foreach ($fields as $key => $value) {
                $stmt->bindValue(":".$key, $value);
            }
           	$stmt->execute();

        }
    }


    public function teacher_update($teacher_code, $teacher_name, $t_position, $t_speciality, $file)
    {


        $sql = "UPDATE `teachers` SET `teacher_name` = :teacher_name, `t_position` = :t_position, `t_speciality` = :t_speciality,   `t_profileImage` = :file  WHERE `teacher_code` = :teacher_code ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":teacher_name", $teacher_name);
        $stmt->bindParam(":t_position", $t_position);
        $stmt->bindParam(":t_speciality", $t_speciality);
        $stmt->bindParam(":file", $file);
        $stmt->bindParam(":teacher_code", $teacher_code);
        return $stmt->execute();

    }


    public function delete($table, $course_id)
    {
    	$sql = 	"DELETE FROM $table WHERE course_id = :course_id";
    	$stmt = $this->pdo->prepare($sql);
    	$stmt->bindParam(":course_id", $course_id);
    	return $stmt->execute();
    }


    public function t_delete($table, $teacher_code)
    {
    	$sql = 	"DELETE FROM $table WHERE teacher_code = :teacher_code";
    	$stmt = $this->pdo->prepare($sql);
    	$stmt->bindParam(":teacher_code", $teacher_code);
    	return $stmt->execute();
    }




    public function checkStudent($roll, $batch)
    {
    	$sql = "SELECT student_id FROM students WHERE roll = :roll AND batch = :batch";
    	$stmt = $this->pdo->prepare($sql);
    	$stmt->bindParam(":roll", $roll, PDO::PARAM_INT);
    	$stmt->bindParam(":batch", $batch, PDO::PARAM_INT);
    	$stmt->execute();

    	$count = $stmt->rowCount();
    	if ($count > 0) {
    		return true;
    	}else {
    		return false;
    	}
    }


    public function checkStudentUser($roll, $batch)
    {
        $sql = "SELECT user_id FROM users WHERE roll = :roll AND batch = :batch";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":roll", $roll, PDO::PARAM_INT);
        $stmt->bindParam(":batch", $batch, PDO::PARAM_INT);
        $stmt->execute();

        $count = $stmt->rowCount();
        if ($count > 0) {
            return true;
        }else {
            return false;
        }
    }

    public function checkTeacherUser($teacher_code)
    {
        $sql = "SELECT user_id FROM users WHERE teacher_code = :teacher_code";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":teacher_code", $teacher_code, PDO::PARAM_STR);
        $stmt->execute();

        $count = $stmt->rowCount();
        if ($count > 0) {
            return true;
        }else {
            return false;
        }
    }


    public function checkTeacher($teacher_code)
    {
    	$sql = "SELECT teacher_id FROM teachers WHERE teacher_code = :teacher_code";
    	$stmt = $this->pdo->prepare($sql);
    	$stmt->bindParam(":teacher_code", $teacher_code, PDO::PARAM_STR);
    	$stmt->execute();

    	$count = $stmt->rowCount();
    	if ($count > 0) {
    		return true;
    	}else {
    		return false;
    	}
    }


    public function checkCourse($course_id)
    {
    	$sql = "SELECT course_id FROM courses WHERE course_id = :course_id";
    	$stmt = $this->pdo->prepare($sql);
    	$stmt->bindParam(":course_id", $course_id, PDO::PARAM_INT);
    	$stmt->execute();

    	$count = $stmt->rowCount();
    	if ($count > 0) {
    		return true;
    	}else {
    		return false;
    	}
    }

    public function checkBatch($batch)
    {
    	$sql = "SELECT DISTINCT batch FROM students WHERE batch = :batch";
    	$stmt = $this->pdo->prepare($sql);
    	$stmt->bindParam(":batch", $batch, PDO::PARAM_INT);
    	$stmt->execute();

    	$count = $stmt->rowCount();
    	if ($count > 0) {
    		return true;
    	}else {
    		return false;
    	}
    }

    public function check_by_Course_Batch($course_id, $batch)
    {
    	$sql = "SELECT id FROM course_by_teacher_batch WHERE course_id = :course_id AND batch = :batch";
    	$stmt = $this->pdo->prepare($sql);
    	$stmt->bindParam(":course_id", $course_id, PDO::PARAM_INT);
			$stmt->bindParam(":batch", $batch, PDO::PARAM_INT);
    	$stmt->execute();

    	$count = $stmt->rowCount();
    	if ($count > 0) {
    		return true;
    	}else {
    		return false;
    	}
    }

    public function check_by_Course_Batch_teacher($course_id, $batch, $teacher_code)
    {
    	$sql = "SELECT id FROM course_by_teacher_batch WHERE course_id = :course_id AND teacher_code = :teacher_code AND batch = :batch";
    	$stmt = $this->pdo->prepare($sql);
    	$stmt->bindParam(":course_id", $course_id, PDO::PARAM_INT);
    	$stmt->bindParam(":teacher_code", $teacher_code, PDO::PARAM_STR);
			$stmt->bindParam(":batch", $batch, PDO::PARAM_INT);
    	$stmt->execute();

    	$count = $stmt->rowCount();
    	if ($count > 0) {
    		return true;
    	}else {
    		return false;
    	}
    }


    public function check_by_Batch_Roll($batch, $roll, $course_id)
    {
    	$table_name = $batch."_".$course_id;

    	$sql = "SELECT id FROM {$table_name} WHERE roll = :roll";
    	$stmt = $this->pdo->prepare($sql);
    	$stmt->bindParam(":roll", $roll, PDO::PARAM_INT);
    	$stmt->execute();

    	$count = $stmt->rowCount();
    	if ($count > 0) {
    		return true;
    	}else {
    		return false;
    	}
    }


    public function check_tutorial_by_roll($batch, $roll, $course_id)
    {
        $table_name = "t_".$batch."_".$course_id;

        $sql = "SELECT id FROM {$table_name} WHERE roll = :roll";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":roll", $roll, PDO::PARAM_INT);
        $stmt->execute();

        $count = $stmt->rowCount();
        if ($count > 0) {
            return true;
        }else {
            return false;
        }
    }


    public function check_assignment_by_roll($batch, $roll, $course_id)
    {
        $table_name = "ass_".$batch."_".$course_id;

        $sql = "SELECT id FROM {$table_name} WHERE roll = :roll";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":roll", $roll, PDO::PARAM_INT);
        $stmt->execute();

        $count = $stmt->rowCount();
        if ($count > 0) {
            return true;
        }else {
            return false;
        }
    }



    public function import($file)
    {
    	$valid = 0;
    	$invalid = 0;
    	$first = false;
    	$file = fopen("uploads/".$file,'r');
    	while ($row = fgetcsv($file)) {
    		$roll 				= $row[0];
    		$student_name = $row[1];
    		$batch 				= $row[2];

    		$roll = $this->checkInput($roll);
    		$student_name = $this->checkInput($student_name);
    		$batch = $this->checkInput($batch);

    		if (!$first ) {
    			$first = true;
    		}else {

    			if ($this->checkStudent($roll, $batch) === true) {
    				$invalid++;
    				continue;
    			}

	    		$sql = "INSERT INTO students(roll, student_name,batch) VALUES(:roll, :student_name, :batch)";
	    		$stmt = $this->pdo->prepare($sql);
	    		$stmt->bindParam(":roll", $roll, PDO::PARAM_INT);
	    		$stmt->bindParam(":student_name", $student_name, PDO::PARAM_STR);
	    		$stmt->bindParam(":batch", $batch, PDO::PARAM_INT);
	    		$result = $stmt->execute();

	    		$valid +=1;
    		}

    	}
    	$total_rows = $valid + $invalid;

    	echo "You have added <span class='text-success'>$valid</span> new students </br>";
    	echo "<span class='text-info'>Total Students $total_rows</span> & <span class='text-danger'>Repeated Students $invalid</span>";

    }



    // Create Attendence Table
    public function create_table_batch_course_id($batch, $course_id)
    {
    	$table_name = $batch."_".$course_id;

			$sql = "CREATE TABLE `{$table_name}` (id int(11) AUTO_INCREMENT,roll int(4) NOT NULL, PRIMARY KEY  (id))";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
    }


    public function add_column($date, $batch, $course_id)
    {
    	$table_name = $batch."_".$course_id;
    	$sql = "ALTER TABLE {$table_name} ADD COLUMN `$date` VARCHAR(10)";
    	$stmt = $this->pdo->prepare($sql);
    	$stmt->execute();
    }


    public function update_column($date, $batch, $course_id, $roll, $value)
    {
    	$table_name = $batch."_".$course_id;
    	$sql = "UPDATE {$table_name} SET `{$date}` = '{$value}' WHERE roll = :roll";
    	$stmt = $this->pdo->prepare($sql);
    	$stmt->bindParam(":roll", $roll, PDO::PARAM_INT);
    	$stmt->execute();
    }


    // Create Tutorial Table

    public function create_tutorial_table_by_batch_course_id($batch, $course_id)
    {
        $table_name = "t_".$batch."_".$course_id;

        $sql = "CREATE TABLE `{$table_name}` (id int(11) AUTO_INCREMENT,roll int(4) NOT NULL,PRIMARY KEY  (id))";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
    }


    public function add_tutorial_column($tutorial_no, $batch, $course_id)
    {
        $table_name = "t_".$batch."_".$course_id;
        $sql = "ALTER TABLE {$table_name} ADD COLUMN `$tutorial_no` VARCHAR(15)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
    }


    public function update_tutorial_column($tutorial_no, $batch, $course_id, $roll, $tutorial_mark)
    {
        $table_name = "t_".$batch."_".$course_id;
        $sql = "UPDATE {$table_name} SET `{$tutorial_no}` = '{$tutorial_mark}' WHERE roll = :roll";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":roll", $roll, PDO::PARAM_INT);
        $stmt->execute();
    }




    // Create Assignment Table

    public function create_assignment_table_by_batch_course_id($batch, $course_id)
    {
        $table_name = "ass_".$batch."_".$course_id;

        $sql = "CREATE TABLE `{$table_name}` (id int(11) AUTO_INCREMENT,roll int(4) NOT NULL,PRIMARY KEY  (id))";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
    }


    public function add_assignment_column($assignment_no, $batch, $course_id)
    {
        $table_name = "ass_".$batch."_".$course_id;
        $sql = "ALTER TABLE {$table_name} ADD COLUMN `$assignment_no` VARCHAR(15)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
    }


    public function update_assignment_column($assignment_no, $batch, $course_id, $roll, $assignment_mark)
    {
        $table_name = "ass_".$batch."_".$course_id;
        $sql = "UPDATE {$table_name} SET `{$assignment_no}` = '{$assignment_mark}' WHERE roll = :roll";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":roll", $roll, PDO::PARAM_INT);
        $stmt->execute();
    }


    public function best_two_avg_find($numbers)
    {
        $numbers = array($numbers);

        $count = count($numbers[0]);

        $num1 = $numbers[0][2];

        $max2=[];
        $j=0;
        for($i=2; $i< $count; $i++){
            $max2[$j]=$numbers[0][$i];
            $j++;
        }

        rsort($max2);

        $best_1=(int)$max2[0];
        $best_2=(int)$max2[1];

        $avg= ($best_1 + $best_2) / 2;
        return $avg;
    }




     public function attendence_value_count($value)
    {
        $value = array($value);
        //var_dump($value);

        $count = count($value[0]);
        //var_dump($count);

        $present = 0;
        $absent = 0;
        for($i=2; $i< $count; $i++){
            if ($value[0][$i] === "present") {
                $present +=1;
            }elseif ($value[0][$i] === "absent") {
                $absent +=1;
            }
        }

        //var_dump($present);
        //var_dump($absent);

        $total = $present + $absent;
        //var_dump($total);

        $ratio = round(( $present / $total ) * 10);
        //var_dump($ratio);

        return $ratio;

    }




    public function present_attendence_count($value)
    {
        $value = array($value);
        //var_dump($value);

        $count = count($value[0]);
        //var_dump($count);

        $present = 0;
        $absent = 0;
        for($i=2; $i< $count; $i++){
            if ($value[0][$i] === "present") {
                $present +=1;
            }elseif ($value[0][$i] === "absent") {
                $absent +=1;
            }
        }

        //var_dump($present);

        return $present;

    }


    public function absent_attendence_count($value)
    {
        $value = array($value);
        //var_dump($value);

        $count = count($value[0]);
        //var_dump($count);

        $present = 0;
        $absent = 0;
        for($i=2; $i< $count; $i++){
            if ($value[0][$i] === "present") {
                $present +=1;
            }elseif ($value[0][$i] === "absent") {
                $absent +=1;
            }
        }
        //var_dump($absent);

        return $absent;

    }




















}



?>