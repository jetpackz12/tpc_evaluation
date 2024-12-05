<?php

/**
 * 
 */
class subjectManagementController extends Controller
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
		
		if(isset($_SESSION['name']) && isset($_SESSION['username']) && isset($_SESSION['usertype'])) 
		{
			$object = new subjectModel;
			$subject = $object->index();
			$object = new semesterModel;
			$semester = $object->retrieveAllData();
			$object = new yearLevelModel;
			$year_level = $object->retrieveAllData();
			$object = new programModel;
			$program = $object->retrieveAllData();

			$this->controller->view()->render4('admin/subjectManagement/subjectManagement.php', $subject, $semester, $year_level, $program);
		} 
		else 
		{
			$this->controller->view()->view_render('login/adminLogin.php');
		}

	}

	public function store()
	{
		$subject_code = filter_input(INPUT_POST, "subject_code", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$subject_name = filter_input(INPUT_POST, "subject_name", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$semester = filter_input(INPUT_POST, "semester", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$year_level = filter_input(INPUT_POST, "year_level", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$program = filter_input(INPUT_POST, "program", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;

		if(isset($subject_code) && isset($subject_name)
		&& isset($semester) && isset($year_level) && isset($program))
		{
			$object = new subjectModel();
			$result = $object->store([
				'subject_code' => $subject_code,
				'subject_name' => $subject_name,
				'semester' => $semester,
				'year_level' => $year_level,
				'program' => $program,
			]);

			switch ($result['response']) {
				case $this->SUCCESS_RESPONSE:
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

	public function edit()
	{

		$id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		if(isset($id))
		{
			$object = new subjectModel();
			$result = $object->edit(['id' => $id]);
			
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

	public function update()
	{
		$id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$old_subject_code = filter_input(INPUT_POST, "old_subject_code", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$subject_code = filter_input(INPUT_POST, "subject_code", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$subject_name = filter_input(INPUT_POST, "subject_name", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$semester = filter_input(INPUT_POST, "semester", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$year_level = filter_input(INPUT_POST, "year_level", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$program = filter_input(INPUT_POST, "program", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;

		if(isset($id) && isset($old_subject_code)
		&&isset($subject_code) && isset($subject_name)
		&& isset($semester) && isset($year_level) && isset($program))
		{
			$object = new subjectModel();
			$result = $object->update([
				'id' => $id,
				'old_subject_code' => $old_subject_code,
				'subject_code' => $subject_code,
				'subject_name' => $subject_name,
				'semester' => $semester,
				'year_level' => $year_level,
				'program' => $program,
			]);

			switch ($result['response']) {
				case $this->SUCCESS_RESPONSE:
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

	public function updateStatus()
	{
		$id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$status = filter_input(INPUT_POST, "status", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;

		if(isset($id) && isset($status))
		{
			$object = new subjectModel();
			$result = $object->updateStatus([
				'id' => $id,
				'status' => $status,
			]);

			switch ($result['response']) {
				case $this->SUCCESS_RESPONSE:
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