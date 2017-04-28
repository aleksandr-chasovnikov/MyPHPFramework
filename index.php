<?php 

// FRONT CONTROLLER

// Общие настройки
ini_set('display_errors', 1);
error_reporting(E_ALL);

// session_start();


// Функция для удобства отладки:
function vd($var)
{
	echo "<pre><h2>=== print_r: ===</h2><h3>";
	print_r($var);

	echo "<br /></h3><h2>=== var_dump : ===</h2>";
	var_dump($var);
	echo "</pre>";
	die;
}


// Подключение файлов системы
define('ROOT', dirname(__FILE__));
require_once ROOT . '/components/autoload.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathParts = explode('/', $path);

$ctrl = !empty($pathParts[1]) ? ucfirst($pathParts[1]) : 'News';
$act = !empty($pathParts[2]) ? ucfirst($pathParts[2]) : 'All';

$controllerClassName = 'Application\\Controllers\\' . $ctrl . 'Controller';

try {

	$controller = new $controllerClassName;
	$method = 'action' . $act;
	$controller->$method();
	
} catch (Exception $e) {
	$view = new View('error', $e);
	$view->display('error.php');
}