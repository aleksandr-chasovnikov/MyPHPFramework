<?php


function __autoload($class_name)
{
	$arr = [
		'/models/',
		'/controllers/',
		'/components/'
	];

	foreach ($arr as $arr) {
		
		$path = ROOT . $arr . $class_name . '.php';

		if (is_file($path)) {
			include_once $path;
		}
	}
}
