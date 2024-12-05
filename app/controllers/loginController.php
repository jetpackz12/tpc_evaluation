<?php

/**
 * 
 */
class loginController extends Controller
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

		if (
			isset($_SESSION['id']) && isset($_SESSION['lastname']) && isset($_SESSION['firstname'])
			&& isset($_SESSION['middlename']) && isset($_SESSION['program_id'])
			&& isset($_SESSION['year_level_id']) && isset($_SESSION['student_status_id'])
			&& isset($_SESSION['studentId']) && isset($_SESSION['usertype'])
		) {
			return $this->controller->view()->view_render('student/dashboard/studentDashboard.php');
		}

		$identification = filter_input(INPUT_POST, "identification", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;

		if (isset($identification) && isset($password)) {
			$object = new studentModel();
			$result = $object->authentication(array(
				'identification' => $identification,
				'password' => $password,
			));

			switch ($result['response']) {
				case $this->SUCCESS_RESPONSE:
					$_SESSION['id'] = $result['data']['id'];
					$_SESSION['lastname'] = $result['data']['lastname'];
					$_SESSION['firstname'] = $result['data']['firstname'];
					$_SESSION['middlename'] = $result['data']['middlename'];
					$_SESSION['program_id'] = $result['data']['program_id'];
					$_SESSION['year_level_id'] = $result['data']['year_level_id'];
					$_SESSION['student_status_id'] = $result['data']['student_status_id'];
					$_SESSION['studentId'] = $result['data']['studentId'];
					$_SESSION['usertype'] = 'student';

					echo json_encode([
						'response' => $result['response'],
						'message' => $result['message'],
						'data' => $result['data']
					]);
					break;

				default:
					echo json_encode([
						'response' => $result['response'],
						'message' => $result['message']
					]);
					break;
			}
		} else {
			unset($_SESSION['id']);
			unset($_SESSION['lastname']);
			unset($_SESSION['firstname']);
			unset($_SESSION['middlename']);
			unset($_SESSION['program_id']);
			unset($_SESSION['year_level_id']);
			unset($_SESSION['student_status_id']);
			unset($_SESSION['studentId']);
			unset($_SESSION['usertype']);

			session_destroy();
			$this->controller->view()->view_render('login/login.php');
		}
	}
}
