<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>All</title>
</head>
<body>
<a href="/">На главную</a>

<?php foreach ($items as $item): ?>
	<h2><a href="News/One?id=<?= $item->id;?>"><?php echo $item->title; ?></a></h2>
	<div><?php echo $item->content; ?></div>
<?php endforeach; ?>

	
</body>
</html>