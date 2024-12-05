<?php

/**
 * 
 */
class studentEvaluationController extends Controller
{
	private $controller;
    private $SUCCESS_RESPONSE = '1';
    private $FAILED_RESPONSE = '0';
    private $HAS_DATA = '1';
    private $HAS_NO_DATA = '0';

	function __construct()
	{
		$this->controller = new Controller();
	}

	public function index()
	{

		if(isset($_SESSION['e_program']) && isset($_SESSION['e_instructor']) && isset($_SESSION['e_semester'])
		&& isset($_SESSION['e_subjects']) && isset($_SESSION['e_academic_year'])) 
		{
			$object = new categoryModel();
			$category = $object->retrieveAllData();

			$object = new faceToFaceModel();
			$faceToFaceQuestion = $object->retrieveAllData();

			$object = new onlineModel();
			$onlineQuestion = $object->retrieveAllData();

			$object = new subjectMatterModel();
			$subjectMatterQuestion = $object->retrieveAllData();

			return $this->controller->view()->render4('student/evaluation/studentEvaluationForm.php', $category, $faceToFaceQuestion, $onlineQuestion, $subjectMatterQuestion);
		}
		
		if(isset($_SESSION['id']) && isset($_SESSION['lastname']) && isset($_SESSION['firstname'])
		&& isset($_SESSION['middlename']) && isset($_SESSION['program_id'])
		&& isset($_SESSION['year_level_id']) && isset($_SESSION['student_status_id'])
		&& isset($_SESSION['studentId']) && isset($_SESSION['usertype'])) 
		{
			$object = new programModel();
			$program = $object->retrieveAllData();

			$object = new semesterModel();
			$semester = $object->retrieveAllData();

			$this->controller->view()->render2('student/evaluation/studentEvaluation.php', $program, $semester);
		} 
		else 
		{
			$this->controller->view()->view_render('login/login.php');
		}

	}

	public function store()
	{
		$program = filter_input(INPUT_POST, "program", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$instructor = filter_input(INPUT_POST, "instructor", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$semester = filter_input(INPUT_POST, "semester", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$subjects = filter_input(INPUT_POST, "subjects", FILTER_DEFAULT, FILTER_REQUIRE_ARRAY) ?? [];
		$academic_year = filter_input(INPUT_POST, "academic_year", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;

		if(isset($program) && isset($instructor)
			&& isset($semester) && isset($subjects)
			&& isset($academic_year))
		{
			$object = new evaluationModel();
			$result = $object->checkInstructor([
				'program' => $program,
				'instructor' => $instructor,
				'semester' => $semester,
				'subjects' => $subjects,
				'academic_year' => $academic_year
			]);

			switch ($result) {
				case $this->HAS_NO_DATA:
						$_SESSION['e_program'] = $program;
						$_SESSION['e_instructor'] = $instructor;
						$_SESSION['e_semester'] = $semester;
						$_SESSION['e_subjects'] = implode(',', $subjects);
						$_SESSION['e_academic_year'] = $academic_year;

						echo json_encode([
							'response' => '1',
							'message' => 'You may start the evaluation.'
						]);

					break;
				
				default:
					echo json_encode([
						'response' => $this->FAILED_RESPONSE,
						'message' => "You already evaluate this instructor!"
					]);
					break;
			}
			
			
		}
		else
		{
			echo json_encode([
				'response' => $this->FAILED_RESPONSE,
				'message' => "Failed, Please check inputted data."
			]);
		}
	}

	public function getInstructors()
	{

		$id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		if(isset($id))
		{
			$object = new teacherModel();
			$result = $object->getDataByProgram(['id' => $id]);
			
			if(isset($result))
			{
				echo json_encode($result);
			}
		}
		else
		{
			echo json_encode([
				'response' => '0',
				'message' => "Failed, Please check inputted data."
			]);
		}
	}

	public function getSubjects()
	{

		$id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$program = filter_input(INPUT_POST, "program", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		if(isset($id) && isset($program))
		{
			$object = new teacherModel();
			$result = $object->getDataBySemester(['id' => $id, 'program' => $program]);
			
			if(isset($result))
			{
				echo json_encode($result);
			}
		}
		else
		{
			echo json_encode([
				'response' => '0',
				'message' => "Failed, Please check inputted data."
			]);
		}
	}
	

}
?>