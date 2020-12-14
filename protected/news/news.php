<?php 
	$query = "SELECT id, title, content, cargroup, creator FROM news ORDER BY cargroup";
	require_once DATABASE_CONTROLLER;
	$news = getList($query);
?>
<?php if(count($news) <= 0) : ?>
	<h1>Az adatbázisban nincsenek hírek eltárolva!</h1>
<?php else : ?>
<form>
<div class="container-fluid row justify-content-center">
	<table class="table table-striped news">
		<thead>
			<tr>
				<th scope="col">Autós hírek listája</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 0; ?>
			<?php foreach ($news as $n) : ?>
				<?php $i++; ?>
				<tr>
					<td><a href="index.php?P=content&d=<?=$n['id'] ?>"><?=$n['title']?> Csoport: <?=$n['cargroup']?> Készítette: <?=$n['creator']?></a></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
</div>
</form>
<?php endif; ?>
