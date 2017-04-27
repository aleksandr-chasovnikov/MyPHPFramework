<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Редактировать</title>
</head>
<body>

<form action="Update" method="post">
	<input type="text" name="title" value ="<?php echo $items->title; ?>">
	<br>
	<br>
	<input type="text" name="content" value="<?php echo $items->content; ?>">
	<br>
	<br>
	<input type="submit" name="submit">
</form>
	
</body>
</html>