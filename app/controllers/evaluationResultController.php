<?php

/**
 * 
 */
class evaluationResultController extends Controller
{
	private $controller;
	function __construct()
	{
		$this->controller = new Controller();
	}

	public function index()
	{
		
		if(isset($_SESSION['name']) && isset($_SESSION['username']) && isset($_SESSION['usertype'])) 
		{
			
			$object = new programModel;
			$program = $object->retrieveAllData();
			$object = new semesterModel();
			$semester = $object->retrieveAllData();
			$object = new categoryModel();
			$category = $object->retrieveAllData();
			$object = new faceToFaceModel();
			$faceToFaceQuestions = $object->retrieveAllData();
			$object = new onlineModel();
			$onlineQuestions = $object->retrieveAllData();
			$object = new subjectMatterModel();
			$subjectMatterQuestions = $object->retrieveAllData();

			$this->controller->view()->render6('admin/evaluationResult/evaluationResult.php', $program, $semester, $category, $faceToFaceQuestions, $onlineQuestions, $subjectMatterQuestions);
		} 
		else 
		{
			$this->controller->view()->view_render('login/adminLogin.php');
		}

	}

	public function filter()
	{
		$program = filter_input(INPUT_POST, "program", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;

		if(isset($program))
		{
			$object = new evaluationModel();
			$result = $object->filter([
				'program' => $program
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

	public function view()
	{
		$id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$academic_year = filter_input(INPUT_POST, "academic_year", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$semester = filter_input(INPUT_POST, "semester", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;

		if(isset($id) && isset($academic_year) && isset($semester))
		{
			$object = new evaluationModel();
			$result = $object->view([
				'id' => $id,
				'academic_year' => $academic_year,
				'semester' => $semester,
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