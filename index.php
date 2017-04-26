<?php 

// FRONT CONTROLLER

// Общие настройки
ini_set('display_errors', 1);
error_reporting(E_ALL);

// session_start();

// Подключение файлов системы
define('ROOT', dirname(__FILE__));
require_once ROOT . '/components/autoload.php';


$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
$act = isset($_GET['act']) ? $_GET['act'] : 'All';

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