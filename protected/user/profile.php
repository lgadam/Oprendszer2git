<div class="container-fluid profile">
	<img src="public/profile.png">
	<h1>Profil</h1>
	<hr>
	<h2>Név: <?=$_SESSION['fname'] ?> <?=$_SESSION['lname'] ?></h2>
	<h3>Email cím: <?=$_SESSION['email'] ?></h3>
	<h4>Jogosultság: <?=$_SESSION['permission'] == 0 ? 'Felhasználó' : 'Adminisztrátor' ?></h3>
	<hr>
</div>