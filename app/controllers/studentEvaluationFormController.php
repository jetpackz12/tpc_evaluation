<?php

/**
 * 
 */
class studentEvaluationFormController extends Controller
{
	private $controller;
    private $SUCCESS_RESPONSE = '1';
    private $FAILED_RESPONSE = '0';

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
			$object = new categoryModel();
			$category = $object->retrieveAllData();

			$object = new faceToFaceModel();
			$faceToFaceQuestion = $object->retrieveAllData();

			$object = new onlineModel();
			$onlineQuestion = $object->retrieveAllData();

			$object = new subjectMatterModel();
			$subjectMatterQuestion = $object->retrieveAllData();

			$this->controller->view()->render4('student/evaluation/studentEvaluationForm.php', $category, $faceToFaceQuestion, $onlineQuestion, $subjectMatterQuestion);
		} 
		else 
		{
			$this->controller->view()->view_render('login/login.php');
		}

	}

	public function store()
	{
		$student_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;
		$teacher_id = isset($_SESSION['e_instructor']) ? $_SESSION['e_instructor'] : null;
		$subject_id = isset($_SESSION['e_subjects']) ? $_SESSION['e_subjects'] : null;
		$academic_year = isset($_SESSION['e_academic_year']) ? $_SESSION['e_academic_year'] : null;
		$semester_id = isset($_SESSION['e_semester']) ? $_SESSION['e_semester'] : null;
		$face_to_face = filter_input(INPUT_POST, "faceToFace", FILTER_DEFAULT, FILTER_REQUIRE_ARRAY) ?? [];
		$online = filter_input(INPUT_POST, "online", FILTER_DEFAULT, FILTER_REQUIRE_ARRAY) ?? [];
		$knowledge_id = filter_input(INPUT_POST, "knowledge_id", FILTER_DEFAULT, FILTER_REQUIRE_ARRAY) ?? [];
		$question = filter_input(INPUT_POST, "question", FILTER_DEFAULT, FILTER_REQUIRE_ARRAY) ?? [];

		if(isset($student_id) && isset($teacher_id)
		&& isset($subject_id) && isset($academic_year)
		&& isset($semester_id) && isset($face_to_face)
		&& isset($online) && isset($knowledge_id)
		&& isset($question))
		{
			$object = new evaluationModel();
			$result = $object->store([
				'student_id' => $student_id,
				'teacher_id' => $teacher_id,
				'subject_id' => $subject_id,
				'academic_year' => $academic_year,
				'semester_id' => $semester_id,
				'face_to_face' => $face_to_face,
				'online' => $online,
				'knowledge_id' => $knowledge_id,
				'question' => $question,
			]);

			switch ($result['response']) {
				case $this->SUCCESS_RESPONSE:
						unset($_SESSION['e_program']);
						unset($_SESSION['e_instructor']);
						unset($_SESSION['e_semester']);
						unset($_SESSION['e_subjects']);
						unset($_SESSION['e_academic_year']);
						
						echo json_encode([
							'response' => $result['response'],
							'message' => $result['message']
						]);
					break;
				
				default:
						echo json_encode([
							'response' => $result['response'],
							'message' => $result['message']
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

}
?>