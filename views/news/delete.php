<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Удаление</title>
</head>
<body>


	<h2><?php echo $item->title; ?></h2>
	<div>
		<form action="News/Delete/<?= $item->id;?>" method="post">
			<input type="submit" value="Удалить">
		</form>
	</div>


	
</body>
</html>