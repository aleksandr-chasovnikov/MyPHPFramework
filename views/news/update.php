<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Редактировать</title>
</head>
<body>

<form action="#" method="post">
	<input type="text" name="title" value ="<?php echo $items->title; ?>" requred>
	<br>
	<br>
	<input type="text" name="content" value="<?php echo $items->content; ?>" requred>
	<br>
	<br>
	<input type="submit" name="submit">
</form>
	
</body>
</html>