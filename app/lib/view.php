<?php

class view{

	public function render($url, $data = array()){
		require PATH_VIEW.$url;
	}

	public function render2($url, $data = array(), $data2 = array()){
		require PATH_VIEW.$url;
	}

	public function render3($url, $data = array(), $data2 = array(), $data3 = array()){
		require PATH_VIEW.$url;
	}

	public function render4($url, $data = array(), $data2 = array(), $data3 = array(), $data4 = array()){
		require PATH_VIEW.$url;
	}

	public function render5($url, $data = array(), $data2 = array(), $data3 = array(), $data4 = array(), $data5 = array()){
		require PATH_VIEW.$url;
	}
	public function render6($url, $data = array(), $data2 = array(), $data3 = array(), $data4 = array(), $data5 = array(), $data6 = array()){
		require PATH_VIEW.$url;
	}

	public function view_render($url)
	{
		require PATH_VIEW.$url;
	}

	public function direct()
	{
		require PATH_VIEW.'/login/login.php';
		// header('location: ' . PATH_VIEW);
	}

}


?>