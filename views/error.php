<?php
switch ($error) {
	case 'errorOne':
		$errorMessage = 'Такая статья не найдена';
		break;
	case 'errorAll':
		$errorMessage = 'Ничего не найдено...';
		break;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ошибка!!!</title>
</head>
<body>
	<h1>Внимание</h1>
	<div class="error"><?= $errorMessage; ?></div>
	
</body>
</html>