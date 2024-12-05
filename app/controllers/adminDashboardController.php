<?php

/**
 * 
 */
class adminDashboardController extends Controller
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
			$this->controller->view()->view_render('admin/dashboard/adminDashboard.php');
		} 
		else 
		{
			$this->controller->view()->view_render('login/adminLogin.php');
		}

	}

}
?>