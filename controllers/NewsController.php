<?php

class NewsController
{
	public function actionAll()
	{
		// $items = News::getAll();
		// $view = new View;
		// $view->assign('items', $news);
		// $view->display('news/all.php');

		// $article = NewsModel::findOneByColumn('title', 'Hello');


		$article = new NewsModel();

		// Присвоение через __set()
		$article->title = 'wefef';
		$article->text = 'sgsdgggsdgsdg';
		$article->indsert();

		var_dump($article->id);
	}

	// public function actionOne()
	// {
	// 	$id = $_GET['id'];
	// 	$items = News::getOne($id);
	// 	$view = new View;
	// 	$view->assign('items', $item);
	// 	$view->display('news/one.php');
		
	// }

}
