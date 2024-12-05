<?php

/**
 * 
 */
class registrationController extends Controller
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
		
		$object = new programModel();
		$programs = $object->retrieveAllData();
		$object = new yearLevelModel();
		$year_level = $object->retrieveAllData();
		$object = new studentStatusModel();
		$student_status = $object->retrieveAllData();
		
		$this->controller->view()->render3('login/registration.php', $programs, $year_level, $student_status);

	}

	public function store()
	{
		$lastname = filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$firstname = filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$middlename = filter_input(INPUT_POST, "middlename", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$program = filter_input(INPUT_POST, "program", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$year_level = filter_input(INPUT_POST, "year_level", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$status = filter_input(INPUT_POST, "status", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$student_identification = filter_input(INPUT_POST, "student_identification", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;

		if(isset($lastname) && isset($firstname)
			&& isset($middlename) && isset($program)
			&& isset($year_level) && isset($status)
			&& isset($student_identification) && isset($password))
		{
			$object = new studentModel();
			$result = $object->store([
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