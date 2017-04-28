<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>One</title>
</head>
<body>
<a href="/">На главную</a>

	<h2><?php echo $items->title; ?><a href="/news/save?id=<?= $items->id;?>">Редактировать</a></h2>
	<a href="/news/delete?id=<?= $items->id;?>">Удалить</a></h2>
	<div><?php echo $items->content; ?></div>
	
</body>
</html>