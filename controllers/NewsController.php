 <?php

class NewsController
{

	/**
	 * Возращает множество записей
	 */
	public function actionAll()
	{
		$items = NewsModel::findAll();
		$view = new View();
		$view->assign('items', $items);
		$view->display('news/all.php');
	}

	/**
	 * Возращает одну запись по id
	 */
	public function actionOne()
	{
		$id = $_GET['id'];
		$items = NewsModel::findOneById($id);

		if (empty($items)) {
			throw new ModelException('errorOne');

		} else {

		$view = new View();
		$view->assign('items', $items);
		$view->display('news/one.php');
		}
	}

	/**
	 * Возращает одну запись имени и значению поля
	 */
	public function actionColumn()
	{
		$column = $_GET['column'];
		$value = $_GET['value'];
		$items = NewsModel::findOneByColumn($column, $value);

		if (empty($items)) {
			throw new ModelException('errorOne');

		} else {

		$view = new View();
		$view->assign('items', $items);
		$view->display('news/one.php');
		}
	}

	/**
	 * Создает запись
	 */
	public function actionCreate()
	{
		require_once ROOT . '/views/news/create.php';
		if (!empty($_POST['title']) || !empty($_POST['content'])) {

			$item->title=$_POST['title'];
			$item->content=$_POST['content'];
			$item = new NewsModel();
			$item->insert();
		}
	}
}
