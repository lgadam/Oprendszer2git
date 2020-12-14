<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] < 1) : ?>
	<h1>Az oldal nem elérhető</h1>
<?php else : ?>
	<?php 
	if(array_key_exists('d', $_GET) && !empty($_GET['d']) && $_GET['d'] != $_SESSION['uid']) // saját felhasználóját nem törölheti ki
	{
	 	$query = "DELETE FROM users WHERE id = :id";
		$params = [':id' => $_GET['d']];
		require_once DATABASE_CONTROLLER;
		if(!executeDML($query, $params)) 
		{
			echo "Hiba törlés közben!";
		}	
	}
 	?>
	<?php 
	$query = "SELECT id, first_name, last_name, email, permission FROM users ORDER BY permission DESC";
	require_once DATABASE_CONTROLLER;
	$users = getList($query);
	?>
	<?php if(count($users) <= 0) : ?>
		<h1>Az adatbázisban nem található felhasználó</h1>
	<?php else : ?>
		<table class="table table-striped bg-white">
			<thead>
				<tr>
					<th scope="col">Id</th>
					<th scope="col">Keresztnév</th>
					<th scope="col">Vezetéknév</th>
					<th scope="col">Email</th>
					<th scope="col">Jogosultság</th>
					<th scope="col">felhasználó törlése</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 0; ?>
				<?php foreach ($users as $u) : ?>
					<?php $i++; ?>
					<tr>
						<th scope="row"><?=$i ?></th>
						<td><?=$u['first_name'] ?></td>
						<td><?=$u['last_name'] ?></td>
						<td><?=$u['email'] ?></td>
						<td><?=$u['permission'] ?></td>
						<td><a href="index.php?P=user_list&d=<?=$u['id'] ?>">Törlés</a></td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	<?php endif; ?>
<?php endif; ?>