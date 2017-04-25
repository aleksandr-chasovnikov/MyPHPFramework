<?php foreach ($items as $item): ?>
	<h2><?php echo $item->title; ?></h2>
	<div><?php echo $item->text; ?></div>
<?php endforeach; ?>