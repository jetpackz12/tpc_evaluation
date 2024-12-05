<?php

/**
 * 
 */
class studentProfileController extends Controller
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

			$object = new programModel();
			$programs = $object->retrieveAllData();
			$object = new yearLevelModel();
			$year_level = $object->retrieveAllData();
			$object = new studentStatusModel();
			$student_status = $object->retrieveAllData();
	
			$this->controller->view()->render3('student/profile/studentProfile.php', $programs, $year_level, $student_status);
		} 
		else 
		{
			$this->controller->view()->view_render('login/login.php');
		}

	}

	public function edit()
	{

		$id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		if(isset($id))
		{
			$object = new studentModel();
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
		$old_password = filter_input(INPUT_POST, "old_password", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$old_student_identification = filter_input(INPUT_POST, "old_student_identification", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$lastname = filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$firstname = filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$middlename = filter_input(INPUT_POST, "middlename", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$program = filter_input(INPUT_POST, "program", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$year_level = filter_input(INPUT_POST, "year_level", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$status = filter_input(INPUT_POST, "status", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$student_identification = filter_input(INPUT_POST, "student_identification", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;

		if(isset($id) && isset($old_password) && isset($old_student_identification)
			&& isset($lastname) && isset($firstname)
			&& isset($middlename) && isset($program)
			&& isset($year_level) && isset($status)
			&& isset($student_identification))
		{

			$object = new studentModel();
			$result = $object->update([
				'id' => $id,
				'old_password' => $old_password,
				'old_student_identification' => $old_student_identification,
				'lastname' => $lastname,
				'firstname' => $firstname,
				'middlename' => $middlename,
				'program' => $program,
				'year_level' => $year_level,
				'status' => $status,
				'student_identification' => $student_identification,
				'password' => $password
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