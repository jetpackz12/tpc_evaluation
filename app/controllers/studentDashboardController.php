<?php

/**
 * 
 */
class studentDashboardController extends Controller
{
	private $controller;
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
			$this->controller->view()->view_render('student/dashboard/studentDashboard.php');
		} 
		else 
		{
			$this->controller->view()->view_render('login/login.php');
		}

	}
	
}
?>