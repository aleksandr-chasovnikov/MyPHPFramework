<?php 

// FRONT CONTROLLER

// Общие настройки
ini_set('display_errors', 1);
error_reporting(E_ALL);

// session_start();

// Подключение файлов системы
define('ROOT', dirname(__FILE__));
require_once ROOT . '/components/autoload.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathParts = explode('/', $path);

$ctrl = !empty($pathParts[1]) ? ucfirst($pathParts[1]) : 'News';
$act = !empty($pathParts[2]) ? ucfirst($pathParts[2]) : 'All';

$controllerClassName = $ctrl . 'Controller';

try {

	$controller = new $controllerClassName;
	$method = 'action' . $act;
	$controller->$method();
	
} catch (Exception $e) {
	// die('Что-то пошло не так: ' . $e->getMessage());
	$view = new View('error', $e);
	$view->display('error.php');
}