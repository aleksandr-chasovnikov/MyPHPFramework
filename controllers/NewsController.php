<?php

namespace Application\Controllers;


use Application\Models\News as NewsModel;

/**
 * NewsController
 */
class NewsController
{

	/**
	 * Возращает все записи
	 * @return object
	 */
	public function actionAll()
	{
		$view = new \View();
		$view->items = NewsModel::getAll();
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
		$items = NewsModel::getOneById($id);

		if (empty($items)) {
			throw new ModelException('errorOne');
		}
		$view = new \View();
		$view->items = $items;
		$view->display('news/one.php');		
	}

	/**
	 * Создает запись
	 * @return integer $id
	 */
	public function actionSave()
	{
		$view = new \View();

		if (isset($_GET['id'])) {
			$view->items = NewsModel::getOneById($_GET['id']);
		}

		$view->display('news/save.php');


		if (!empty($_POST['submit']) && 
			!empty($_POST['title']) && !empty($_POST['content'])) {

			$item = new NewsModel($_POST['id'], $_POST['title'], $_POST['content']);
			$item->save();
		}

	}


	/**
	 * Создает запись
	 * @return integer $id
	 */
	public function actionDelete()
	{
		$item = new NewsModel($_GET['id']);
		$item->delete();
		header('Location: /');
	}

	// /**
	//  * @todo УДАЛИТЬ!!!
	//  * Возращает одну запись имени и значению поля
	//  * @param mixed $column
	//  * @param mixed $value
	//  * @return object
	//  */
	// public function actionColumn()
	// {
	// 	// $column = array_keys($_GET[0]); // ???
	// 	// $value = $_GET[0];
	// 	$column = 'title';
	// 	$value = 'sdfsdf';
	// 	$items = NewsModel::getOneByColumn($column, $value);

	// 	if (empty($items)) {
	// 		throw new ModelException('errorOne');

	// 	} else {

		// 	$view = new \View();
		// 	$view->assign('items', $items);
		// 	$view->display('news/one.php');
		// 	}
	// }
		
}
