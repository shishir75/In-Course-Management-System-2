<?php include_once 'core/init.php'; ?>

<?php require_once 'assets/fpdf.php'; ?>

<?php
	//error_reporting(E_ERROR | E_PARSE);

	if($getFromU->loggedIn() === false) {
		header("Location: index.php");
	}
?>


<?php
	if (isset($_GET['course_id']) && isset($_GET['batch'])) {
		$course_id = $_GET['course_id'];
		$batch 		 = $_GET['batch'];
		if (!empty($course_id) && !empty($batch)) {
			$course_id = $getFromU->checkInput($course_id);
			$batch = $getFromU->checkInput($batch);
		}
	}
?>

<?php

	// $course = $getFromU->viewCourseById($course_id);
	// $course_name = $course->course_name;

	// $view_teacher_code_by_course_id_batch = $getFromU->view_teacher_code_by_course_id_batch($course_id, $batch);

	// $teacher_code = $view_teacher_code_by_course_id_batch->teacher_code;

	// $teacher = $getFromU->viewTeacherByCode($teacher_code);
	// $teacher_name = $teacher->teacher_name;

?>




<?php

	class myPDF extends FPDF
	{



		function data($course_id, $batch)
		{
			if (isset($_GET['course_id']) && isset($_GET['batch'])) {
				$course_id = $_GET['course_id'];
				$batch 		 = $_GET['batch'];
				if (!empty($course_id) && !empty($batch)) {
					$course_id = $getFromU->checkInput($course_id);
					$batch = $getFromU->checkInput($batch);
				}
			}
		}


		function header()
		{

			$this->SetFont('Arial', 'B', 22);
			$this->Cell(0, 5, 'In-Course Marks', 0, 0, 'C');
			$this->Ln();
			$this->SetFont('Times', '', 12);
			$this->Cell(0, 10, "Course Name : $course_name", 0, 0, 'C');
			$this->Ln();
			$this->Cell(0, 10, $batch, 0, 0, 'C');
			$this->Ln();
			$this->Cell(0, 10, "Teacher Name : $teacher_name", 0, 0, 'C');
			$this->Ln(20);

		}

		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial', '', 8);
			$this->Cell(0, 10, 'Page '. $this->PageNo(). '/{nb}', 0, 0, 'C');
		}

		function headerTable()
		{
			$this->SetFont('Arial', '', 12);
			$this->SetFillColor(140, 140, 255);
			$this->SetTextColor(255,255,255);
			$this->Cell(15, 10, 'No', 1, 0, 'C', true);
			$this->Cell(20, 10, 'Roll', 1, 0, 'C', true);
			$this->Cell(55, 10, 'Student Name', 1, 0, 'C', true);
			$this->Cell(25, 10, 'T. Marks', 1, 0, 'C', true);
			$this->Cell(25, 10, 'Att. Marks', 1, 0, 'C', true);
			$this->Cell(25, 10, 'Ass. Marks', 1, 0, 'C', true);
			$this->Cell(25, 10, 'Total Marks', 1, 0, 'C', true);
			$this->Ln();
		}


		function viewtable($db)
		{
			$this->SetFont('Times', '', 12);
			$this->SetTextColor(1,1,1);
			$stmt = $db->query("SELECT * FROM students");
			while ($data = $stmt->fetch(PDO::FETCH_OBJ)) {
			  $this->Cell(20, 10, $data->student_id, 1, 0, 'C');
				$this->Cell(50, 10, $data->student_name, 1, 0, 'C');
				$this->Cell(40, 10, $data->roll, 1, 0, 'C');
				$this->Cell(40, 10, $data->batch, 1, 0, 'C');
				$this->Ln();
			}
		}


	}


	$pdf = new myPDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->data($course_id, $batch);
	$pdf->headerTable();
	$pdf->viewtable($pdo);
	$pdf->Output();






?>