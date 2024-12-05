<?php

/**
 * 
 */
class programManagementController extends Controller
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
			$object = new programModel;
			$program = $object->index();

			$this->controller->view()->render('admin/programManagement/programManagement.php', $program);
		} 
		else 
		{
			$this->controller->view()->view_render('login/adminLogin.php');
		}

	}

	public function store()
	{
		$program_code = filter_input(INPUT_POST, "program_code", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$program_name = filter_input(INPUT_POST, "program_name", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;

		if(isset($program_code) && isset($program_name))
		{
			$object = new programModel();
			$result = $object->store([
				'program_code' => $program_code,
				'program_name' => $program_name,
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
			$object = new programModel();
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
		$old_program_code = filter_input(INPUT_POST, "old_program_code", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$program_code = filter_input(INPUT_POST, "program_code", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$program_name = filter_input(INPUT_POST, "program_name", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;

		if(isset($id) &&isset($program_code) && isset($program_name))
		{
			$object = new programModel();
			$result = $object->update([
				'id' => $id,
				'old_program_code' => $old_program_code,
				'program_code' => $program_code,
				'program_name' => $program_name,
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
			$object = new programModel();
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