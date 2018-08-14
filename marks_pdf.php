<?php
//session_start();
  include_once 'core/init.php';
if($getFromU->loggedIn() === false) {
		header("Location: index.php");
	}

if($_SERVER["REQUEST_METHOD"]=="GET")
{
	$batch=$_GET["batch"];

	$course_id=$_GET["course_id"];

	$course = $getFromU->viewCourseById($course_id);
	$course_name = $course->course_name;

	$view_teacher_code_by_course_id_batch = $getFromU->view_teacher_code_by_course_id_batch($course_id, $batch);

	$teacher_code = $view_teacher_code_by_course_id_batch->teacher_code;

	$teacher = $getFromU->viewTeacherByCode($teacher_code);
	$teacher_name = $teacher->teacher_name;

	//var_dump($course);


		 ?>

<!DOCTYPE html>
<html lang="en">
  <body>



<?php

if(!isset($error)){

        //create html of the data
        ob_start();
        var_dump($course);
        ?>





<section class="summary mt-5">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="text-center">Marks Details</h2>
				<h4 class="text-center">Course Name :  <?php echo $course->course_name; ?> </h4>
				<h5 class="text-center">Batch : <?php echo $batch; ?></h5>
				<h6 class="text-center mb-4">Teacher Name : <?php echo $teacher_name; ?></h6>






				<table class="table table-bordered table-hover">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">Serial</th>
				      <th scope="col">Roll No.</th>
				      <th scope="col">Student Name</th>
				      <th scope="col">Tutorial Matks</th>
				      <th scope="col">Attendence Marks</th>
				      <th scope="col">Assignment Marks</th>
				      <th scope="col">Total Marks</th>
				    </tr>
				  </thead>
				  <tbody>



				  	<?php
				  		$rows = $getFromU->viewStudentsByBatch($batch);
				  		var_dump($rows);
				  		$i = 0;
				  		foreach ($rows as $row) {
				  			$roll = $row->roll;
				  			$student_name = $row->student_name;
				  			$batch = $row->batch;
				  			$i++;

				  			$columns = $getFromU->view_tutorial_column_by_batch_course_id($batch, $course_id);
								//var_dump($columns);
								foreach ($columns as $column) {
									$tutorial_no = $column->Field;

				  	?>
				  		<?php 	} ?>


							<tr>
					      <td class="text-center"><?php echo $i; ?></td>
					      <td class="text-center"><?php echo $roll; ?></td>
					      <td class="text-center"><?php echo $student_name; ?></td>

					      <td class="text-center">
					      	<?php
					      		$marks = array();
					      		$tutorial_marks = $getFromU->view_tutorial_by_roll($batch, $course_id , $roll);
										$marks[] = $tutorial_marks;

										foreach ($marks as $numbers) {
											$tutu_marks = $getFromU->best_two_avg_find($numbers);
										}
						      ?>
						      <?php echo $tutu_marks; ?>



					      </td>



					      <td class="text-center">
					      	<?php
					      		$values = array();
					      		$attendence_marks = $getFromU->view_all_attendene_by_roll($batch, $course_id , $roll);
					      		//var_dump($attendence_marks);
										$values[] = $attendence_marks;

										foreach ($values as $value) {
											$att_marks = $getFromU->attendence_value_count($value);
										}
						      ?>
						      <?php echo $att_marks; ?>

					      </td>

					      <td class="text-center">
					      	<?php
					      		$marks = array();
					      		$assignment_marks = $getFromU->view_assignment_by_roll($batch, $course_id , $roll);
					      		var_dump($assignment_marks);
										$marks[] = $assignment_marks;

										foreach ($marks as $numbers) {
											$ass_marks = $getFromU->best_two_avg_find($numbers);
										}
						      ?>
						      <?php echo $ass_marks; ?>

					      </td>

					      <td class="text-center">
					      	<?php
					      		$total = $tutu_marks + $att_marks + $ass_marks;
					      		echo $total;

					      	?>

					      </td>


				  	<?php } ?>

				  </tbody>
				</table>






			</div>

		</div>
	</div>
</section>

<?php
        $body = ob_get_clean();

        $body = iconv("UTF-8","UTF-8//IGNORE",$body);

        include("mpdf/mpdf.php");
        $mpdf=new \mPDF('c','A4','','' , 20, 20, 20, 20, 0, 0);

        //write html to PDF
        $mpdf->WriteHTML($body);

        //output pdf
        //$mpdf->Output('info.pdf','D');

        //open in browser
        $mpdf->Output();

        //save to server
        //$mpdf->Output("mydata.pdf",'F');

    }


}
 ?>
    <?php //require 'footer.php'; ?>

  </body>
</html>