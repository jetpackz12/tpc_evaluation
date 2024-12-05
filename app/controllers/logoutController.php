<?php

/**
 * 
 */
class logoutController extends Controller
{
	private $controller;
	function __construct()
	{
		$this->controller = new Controller();
	}

	public function index()
	{
		if ($_SESSION['name'] && $_SESSION['username']) 
		{

			unset($_SESSION['name']);
			unset($_SESSION['username']);
			unset($_SESSION['usertype']);

			session_destroy();
			header('location: /TeacherEvaluationv2/adminLogin');

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
			
			unset($_SESSION['e_program']);
			unset($_SESSION['e_instructor']);
			unset($_SESSION['e_semester']);
			unset($_SESSION['e_subjects']);
			unset($_SESSION['e_academic_year']);

			session_destroy();
			header('location: /TeacherEvaluationv2/');

		}
		
	}
	

}
?>