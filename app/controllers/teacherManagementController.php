<?php

/**
 * 
 */
class teacherManagementController extends Controller
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
			$object = new teacherModel();
			$teacher = $object->index();
			$object = new programModel();
			$program = $object->retrieveAllData();

			$this->controller->view()->render2('admin/teacherManagement/teacherManagement.php', $teacher, $program);
		} 
		else 
		{
			$this->controller->view()->view_render('login/adminLogin.php');
		}

	}

	public function store()
	{
		$teacher_id = filter_input(INPUT_POST, "teacher_id", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$lastname = filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$firstname = filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$middlename = filter_input(INPUT_POST, "middlename", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$program = filter_input(INPUT_POST, "program", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;

		if(isset($teacher_id) && isset($lastname) && isset($firstname) && isset($middlename) && isset($program))
		{
			$object = new teacherModel();
			$result = $object->store([
				'teacher_id' => $teacher_id,
				'lastname' => $lastname,
				'firstname' => $firstname,
				'middlename' => $middlename,
				'program' => $program
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
			$object = new teacherModel();
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
		$old_teacher_identification = filter_input(INPUT_POST, "old_teacher_identification", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$teacher_id = filter_input(INPUT_POST, "teacher_id", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$lastname = filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$firstname = filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$middlename = filter_input(INPUT_POST, "middlename", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$program = filter_input(INPUT_POST, "program", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;

		if(isset($id) && isset($old_teacher_identification)
			&& isset($teacher_id) && isset($lastname)
			&& isset($firstname) && isset($middlename) && isset($program))
		{
			$object = new teacherModel();
			$result = $object->update([
				'id' => $id,
				'old_teacher_identification' => $old_teacher_identification,
				'teacher_id' => $teacher_id,
				'lastname' => $lastname,
				'firstname' => $firstname,
				'middlename' => $middlename,
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
			$object = new teacherModel();
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