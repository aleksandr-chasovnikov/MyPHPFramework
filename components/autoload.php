<?php


function __autoload($class_name)
{
	if (file_exists(ROOT . '/controllers/' . $class_name . '.php')) {
		require ROOT . '/controllers/' . $class_name . '.php';
	} elseif (file_exists(ROOT . '/models/' . $class_name . '.php')) {
		require ROOT . '/models/' . $class_name . '.php';
	} elseif (file_exists(ROOT . '/components/' . $class_name . '.php')) {
		require ROOT . '/components/' . $class_name . '.php';
	} else {

		$classParts = explode('\\', $class_name);
		$classParts[0] = ROOT;
		$path = implode(DIRECTORY_SEPARATOR, $classParts) . '.php';
		if (file_exists($path)) {
			require $path;
		}
	}
}
