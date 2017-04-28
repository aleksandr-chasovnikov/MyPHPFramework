<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Удаление</title>
</head>
<body>
<a href="/">На главную</a>


	<h2><?php echo $item->title; ?></h2>
	<div>
		<form action="News/delete/<?= $item->id;?>" method="post">
			<input type="submit" value="Удалить">
		</form>
	</div>


	
</body>
</html>