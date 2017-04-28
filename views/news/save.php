<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Создать</title>
</head>
<body>
	<a href="/">На главную</a>

	<form action="save" method="post">
		<input type="text" name="id" value ="<?php if (isset($_GET['id'])) {echo $items->id;} elseif (isset($_POST['id'])) { echo $_POST['id'];} ?>" >
		<br>
		<br>
		<input type="text" name="title" value ="<?php if (isset($_GET['id'])) {echo $items->title;} elseif (isset($_POST['title'])) { echo $_POST['title'];} ?>" requred>
		<br>
		<br>
		<textarea name="content" cols="100" rows="10" requred><?php if (isset($_GET['id'])) {echo $items->content;} elseif (isset($_POST['content'])) { echo $_POST['content'];} ?></textarea> 
		<br>
		<br>
		<input type="submit" name="submit">
	</form>
</body>
</html>