<?php

/**
 * 
 */
class cancelledAccountController extends Controller
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

			$object = new studentModel();
			$students = $object->cancelledStudents();

			$this->controller->view()->render('admin/studentManagement/cancelledAccount.php', $students);
		} 
		else 
		{
			$this->controller->view()->view_render('login/adminLogin.php');
		}

	}

	public function updateStatusToApproved()
	{
		
		$id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;

		if(isset($_SESSION['name']) && isset($_SESSION['username']) && isset($_SESSION['usertype']) && isset($id)) 
		{
			
			$object = new studentModel();
			$result = $object->updateStatusToApproved([
				'id' => $id
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
			$this->controller->view()->view_render('login/adminLogin.php');
		}

	}

	public function updateStatusToPending()
	{
		
		$id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;

		if(isset($_SESSION['name']) && isset($_SESSION['username']) && isset($_SESSION['usertype']) && isset($id)) 
		{
			
			$object = new studentModel();
			$result = $object->updateStatusToPending([
				'id' => $id
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
			$this->controller->view()->view_render('login/adminLogin.php');
		}

	}

	public function updateMultipleStatus()
	{
		
		$status = filter_input(INPUT_POST, "status", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;

		if(isset($_SESSION['name']) && isset($_SESSION['username']) && isset($_SESSION['usertype']) && isset($status)) 
		{
			$selectedData = implode(',', $_POST['selectedData']);
			
			$object = new studentModel();
			$result = $object->updateMultipleStatus([
				'selectedData' => $selectedData,
				'status' => $status
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
			$this->controller->view()->view_render('login/adminLogin.php');
		}

	}
	

}
?>