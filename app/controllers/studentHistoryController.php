<?php

/**
 * 
 */
class studentHistoryController extends Controller
{
	private $controller;
	function __construct()
	{
		$this->controller = new Controller();
	}

	public function index()
	{
		
		if(isset($_SESSION['id']) && isset($_SESSION['lastname']) && isset($_SESSION['firstname'])
		&& isset($_SESSION['middlename']) && isset($_SESSION['program_id'])
		&& isset($_SESSION['year_level_id']) && isset($_SESSION['student_status_id'])
		&& isset($_SESSION['studentId']) && isset($_SESSION['usertype'])) 
		{
			$object = new teacherModel();
			$teachers = $object->retrieveAllData();
			$object = new categoryModel();
			$category = $object->retrieveAllData();
			$object = new faceToFaceModel();
			$faceToFaceQuestions = $object->retrieveAllData();
			$object = new onlineModel();
			$onlineQuestions = $object->retrieveAllData();
			$object = new subjectMatterModel();
			$subjectMatterQuestions = $object->retrieveAllData();

			$this->controller->view()->render5('student/history/studentHistory.php', $teachers, $category, $faceToFaceQuestions, $onlineQuestions, $subjectMatterQuestions);
		} 
		else 
		{
			$this->controller->view()->view_render('login/login.php');
		}

	}

	public function edit()
	{
		$teacher_id = filter_input(INPUT_POST, "teacher_id", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$academic_year = filter_input(INPUT_POST, "academic_year", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$semester = filter_input(INPUT_POST, "semester", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;

		if (isset($teacher_id) && isset($academic_year) && isset($semester)) 
		{
			
			$object = new evaluationModel();
			$result = $object->edit([
				'teacher_id' => $teacher_id,
				'academic_year' => $academic_year,
				'semester' => $semester
			]);
			
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