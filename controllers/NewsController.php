<?php

class NewsController
{

	/**
	 * Возращает множество записей
	 * @return object
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
	 * @param integer $id
	 * @return object
	 */
	public function actionOne()
	{
		$id = $_GET['id'];
		$items = NewsModel::findOneById($id);

		if (empty($items)) {
			throw new ModelException('errorOne');

		}

		$view = new View();
		$view->assign('items', $items);
		$view->display('news/one.php');
		
	}

	/**
	 * Возращает одну запись имени и значению поля
	 * @param mixed $column
	 * @param mixed $value
	 * @return object
	 */
	public function actionColumn()
	{
		// $column = array_keys($_GET[0]); // ???
		// $value = $_GET[0];
		$column = 'title';
		$value = 'sdfsdf';
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
	 * @return integer $id
	 */
	public function actionCreate()
	{
		require_once ROOT . '/views/news/create.php';

		if (!empty($_POST['title']) && !empty($_POST['content'])) {

			$item = new NewsModel();
			$item->title=$_POST['title'];
			$item->content=$_POST['content'];
			$item->save();
		}
	}

	/**
	 * Создает запись
	 * @return integer $id
	 */
	public function actionUpdate()
	{
		$items = NewsModel::findOneByColumn('title', 'Новый заголовок');

		// if (empty($items)) {
		// 	throw new ModelException('errorOne');
		// } else {
		// 	$view = new View();
		// 	$view->assign('items', $items);
		// 	$view->display('news/update.php');
		// }

		// if (isset($_POST['submit']) && !empty($_POST['title']) && !empty($_POST['content'])) {

			// $item = new NewsModel();
			// $item->title=$_POST['title'];
			// $item->content=$_POST['content'];
			$items->title='Новый заголовок123';
			$items->save();
		// }
			
	}
}
