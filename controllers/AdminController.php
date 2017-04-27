<?php

class AdminController
{
	public function actionIndex()
	{
		$view = new View();
		$view->display('admin/index.php');
	}

	/**
	 * @return
	 */
	public function actionAddNews()
	{
		if (isset($_POST)) {
			if (!empty($_POST['title']) && !empty($_POST['content'])) {
				$model = new News();
				$model->title = $_POST['title'];
				$model->content = $_POST['content'];

				if ($model->save()) {
					header('Location:/index.php');
				}
			}
		}
		$view = new View();
		$view->display('admin/addnews.php');
	}

	public function actionLog()
	{
		$path = ROOT . 'core/error.log';
		if (!file_exists($path)) {
			trow new E404Exception('Журнал ошибок не найден');
		}

		$log = file($path);
		$view = new View();
		$view->log = $log;
		$view->display('admin/log.php');
	}
}