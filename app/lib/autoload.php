<?php
	spl_autoload_register('autoload_lib');
	spl_autoload_register('autoload_controllers');
	spl_autoload_register('autoload_models');
	date_default_timezone_set('Asia/Manila');

	function autoload_lib($filename) {
		$path = 'app/lib/';
		$file = $path . $filename . '.php';

		if (file_exists($file)) {
			include $file;
		}
	}

	function autoload_controllers($class) {
		$path = 'app/controllers/';
		$file = $path . $class . '.php';
		if (file_exists($file)) {
			include $file;
		}
	}

	function autoload_models($class) {
		$path = 'app/models/';
		$file = $path . $class . '.php';
		
		if (file_exists($file)) {
			include $file;
		}
	}
?>