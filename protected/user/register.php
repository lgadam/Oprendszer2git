<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) 
	{
		$postData = 
		[
			'fname' => $_POST['first_name'],
			'lname' => $_POST['last_name'],
			'email' => $_POST['email'],
			'email1' => $_POST['email1'],
			'password' => $_POST['password'],
			'password1' => $_POST['password1']
		];

		if(empty($postData['fname']) || empty($postData['lname']) || empty($postData['email']) || empty($postData['email1']) || empty($postData['password']) || empty($postData['password1'])) 
		{
			echo "<p style='color:red;'>hiányzó adat</p>";
		} else if($postData['email'] != $postData['email1']) 
		{
			echo "<p style='color:red;'>Nem egyező email cím</p>";
		} else if(!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) 
		{
			echo "<p style='color:red;'>Hibás email formátum</p>";
		} else if ($postData['password'] != $postData['password1']) 
		{
			echo "<p style='color:red;'>Nem egyező jelszó</p>";
		} else if(strlen($postData['password']) < 8) 
		{
			echo "<p style='color:red;'>A jelszónak hoszabbnak kell hogy legyen mint 8 karakter</p>";
		} else if(!UserRegister($postData['email'], $postData['password'], $postData['fname'], $postData['lname'])) 
		{
			echo "<p style='color:red;'>Sikertelen regisztráció</p>";
		}
		$postData['password'] = $postData['password1'] = "";
	}
?>


<form method="post">
<div class="background2">
	<h1 class="footer"style="margin-bottom: 16px"><center>Regisztráció</center></h1>
	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="registerFirstName" class="footer">Keresztnév</label>
			<input type="text" class="form-control" id="registerFirstName" name="first_name" value="<?=isset($postData) ? $postData['fname'] : "";?>">
		</div>
		<div class="form-group col-md-6">
			<label for="registerLastName" class="footer">Vezetéknév</label>
			<input type="text" class="form-control" id="registerLastName" name="last_name" value="<?=isset($postData) ? $postData['lname'] : "";?>">
		</div>
	</div>

	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="registerEmail" class="footer">Email</label>
			<input type="email" class="form-control" id="registerEmail" name="email" value="<?=isset($postData) ? $postData['email'] : "";?>">
		</div>
		<div class="form-group col-md-6">
			<label for="registerEmail1" class="footer">Email megerősítése</label>
			<input type="email" class="form-control" id="registerEmail1" name="email1" value="<?=isset($postData) ? $postData['email1'] : "";?>">
		</div>
	</div>

	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="registerPassword" class="footer">Jelszó</label>
			<input type="password" class="form-control" id="registerPassword" name="password" value="">
		</div>
		<div class="form-group col-md-6">
			<label for="registerPassword1" class="footer">Jelszó megerősítése</label>
			<input type="password" class="form-control" id="registerPassword1" name="password1" value="">
		</div>
	</div>
</div>
	<button type="submit" class="btn btn-primary bg-dark" name="register">Regisztráció</button>
</form>