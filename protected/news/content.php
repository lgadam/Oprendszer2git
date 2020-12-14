<?php
	if(array_key_exists('d', $_GET) && !empty($_GET['d'])) 
	{ 
		$query = "SELECT id, title, content, creator FROM news WHERE id = :id";
		$params = [':id' => $_GET['d']];
		require_once DATABASE_CONTROLLER;
		$news = getList($query,$params);
	}
?>
<?php $i = 0; ?>
<?php foreach ($news as $n) : ?>
	<?php $i++; ?>
<div class="container-fluid home">
	<h2><?=$n['title']?></h2>
	<hr>
	<p><?=$n['content']?></p>
	<hr>
	<p>A tartalmat készítette: <?=$n['creator']?></p>
	<a href="index.php?P=news">Vissza</a>
</div>
<?php endforeach;?>
