<?php

/**
 * 
 */
class adminLoginController extends Controller
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
			return $this->controller->view()->view_render('admin/dashboard/adminDashboard.php');
		}

		$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;
		$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? null;

		if(isset($username) && isset($password))
		{
			$object = new userModel();
			$result = $object->authentication(array(
				'username' => $username,
				'password' => $password,
			));

			switch ($result['response']) {
				case '1':
						$_SESSION['name'] = $result['data']['name'];
						$_SESSION['username'] = $result['data']['username'];
						$_SESSION['usertype'] = 'admin';
						
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
			unset($_SESSION['name']);
			unset($_SESSION['username']);
			unset($_SESSION['usertype']);
	
			session_destroy();
			$this->controller->view()->view_render('login/adminLogin.php');
		}
	}

}
?>