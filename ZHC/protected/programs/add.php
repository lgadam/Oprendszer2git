<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] < 1) : ?>
	<h1>Page access is forbidden!</h1>
<?php else : ?>

	<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addProgram'])) {
		$postData = [
			'megnevezes' => $_POST['megnevezes'],
			'fejleszto' => $_POST['fejleszto'],
			'kiado' => $_POST['kiado'],
			'kiadas_eve' => $_POST['kiadas_eve'],
			'letoltesek_szama' => $_POST['letoltesek_szama']
			
		];

		if(empty($postData['megnevezes']) || empty($postData['fejleszto']) || empty($postData['kiado']) || empty($postData['kiadas_eve']) || $postData['letoltesek_szama']){
			echo "Hiányzó adat(ok)!";
		} 
		else {
			$query = "INSERT INTO programok (megnevezes, fejleszto, kiado, kiadas_eve, letoltesek_szama) VALUES (:megnevezes, :fejleszto, :kiado, :kiadas_eve, :letoltesek_szama)";
			$params = [
				':megnevezes' => $postData['megnevezes'],
				':fejleszto' => $postData['fejleszto'],
				':kiado' => $postData['kiado'],
				':kiadas_eve' => $postData['kiadas_eve'],
				':letoltesek_szama' => $postData['letoltesek_szama']
			];
			require_once DATABASE_CONTROLLER;
			if(!executeDML($query, $params)) {
				echo "Hiba az adatbevitel során!";
			} header('Location: index.php?P=add_program');
		}
	}
	?>

	<form method="post">
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="programName">Megnevezés</label>
				<input type="text" class="form-control" id="megnevezes" name="megnevezes">
			</div>
			<div class="form-group col-md-6">
				<label for="programDeveloper">Fejlesztő</label>
				<input type="text" class="form-control" id="fejleszto" name="fejleszto">
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-12">
				<label for="programKiado">Kiadó</label>
				<input type="text" class="form-control" id="kiado" name="kiado">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-12">
		    	<label for="kiadasEve">Kiadás éve</label>
		    	<input type="text" class="form-control" id="kiadas_eve" name="kiadas_eve">
		      		
		  	</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-12">
				<label for="letoltesekSzama">Letöltések száma</label>
				<input type="text" class="form-control" id="letoltesek_szama" name="letoltesek_szama">
			</div>
		</div>

		<button type="submit" class="btn btn-primary" name="addProgram">Add Program</button>
	</form>
<?php endif; ?>