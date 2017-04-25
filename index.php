<?php 

function __autoload($class_name)
{
	$arr = [
		'/models/',
		'/controllers/',
		'/components/'
	];

	foreach ($arr as $arr) {
		$path = __DIR__ . $arr . $class_name . '.php';

		if (is_file($path)) {
			include_once $path;
		}
	}
}

$contName = isset($_GET['ctrl']) ? $_GET['ctrl'] . 'Controller' : 'NewsController';
$actionName = isset($_GET['act']) ? $_GET['act'] : 'All';

$method = 'action' . $actionName;
$controller = new $contName();

$controller->$method();