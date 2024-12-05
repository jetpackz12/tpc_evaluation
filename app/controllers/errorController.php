<?php

/**
 * 
 */
class errorController extends controller
{

	private $controller;
	function __construct()
	{
		$this->controller = new Controller();
	}

	public function index()
	{

		$this->controller->view()->view_render('error/404.php');

	}
}
?>