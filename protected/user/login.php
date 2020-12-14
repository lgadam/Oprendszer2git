<?php 
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) 
	{
		$postData =
		[
			'email' => $_POST['email'],
    	'password' => $_POST['password']
		];
		if (empty($postData['email']) || empty($postData['password'])) 
		{
			echo "<p style='color:red;'>hiányzó adat! ellenőrizd az adatbevitelt</p>";
		} else if (!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) 
		{
    		echo "<p style='color:red;'>hibás emailcím formátum!</p>";
  		} else if(!UserLogin($postData['email'], $postData['password'])) 
  		{
    		echo "<p style='color:red;'>hibás email cím vagy jelszó</p>";
  		}
  		$postData['password'] = "";
	}
?>
<div class="background2">
  <h1 class="footer"><center>Bejelentkezés</center></h1>
  <form method="post">
    <div class="form-group">
      <label for="Email1" class="footer">Email</label>
      <input type="email" class="form-control" id="Email1" name="email" value="<?=isset($postData) ? $postData['email'] : "";?>">
    </div>
    <div class="form-group">
      <label for="Password1" class="footer">Jelszó</label>
      <input type="password" class="form-control" id="Password1" name="password" value="">
    </div>
    <button type="submit" class="btn btn-primary bg-dark" name="login">Bejelentkezés</button>
  </form>
</div>