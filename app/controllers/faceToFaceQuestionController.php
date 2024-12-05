<?php

/**
 * 
 */
class faceToFaceQuestionController extends Controller
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
			$object = new faceToFaceModel;
			$question = $object->index();
			$object = new categoryModel;
			$category = $object->retrieveAllData();

			$this->controller->view()->render2('admin/evaluationManagement/faceToFaceQuestion.php', $question, $category);
		} 
		else 
		{
			$this->controller->view()->view_render('login/adminLogin.php');
		}

	}

	public function store()
	{
		$category_name = filter_input(INPUT_POST, "category_name", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$question = filter_input(INPUT_POST, "question", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;

		if(isset($category_name) && isset($question))
		{
			$object = new faceToFaceModel();
			$result = $object->store([
				'category_name' => $category_name,
				'question' => $question,
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
			$object = new faceToFaceModel();
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
		$category_name = filter_input(INPUT_POST, "category_name", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$question = filter_input(INPUT_POST, "question", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;

		if(isset($id) && isset($category_name) && isset($question))
		{
			$object = new faceToFaceModel();
			$result = $object->update([
				'id' => $id,
				'category_name' => $category_name,
				'question' => $question,
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
			$object = new faceToFaceModel();
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