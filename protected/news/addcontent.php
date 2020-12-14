<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] < 1) : ?>
	<h1>Az oldal nem elérhető</h1>
<?php else : ?>
<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addContent'])) 
	{
		$postData = 
		[
			'title' => $_POST['title'],
			'content' => $_POST['content'],
			'cargroup' => $_POST['cargroup'],
			'creator' => $_SESSION['fname']
		];
		if(empty($postData['title']) || empty($postData['content'])) 
		{
			echo "Hiányzó adatok";
		}else if(strlen($postData['content']) > 1024) 
		{
		echo "A tartalom nem lehet hosszabb mint 1024 karakter";
		}
		else 
		{
			$query = "INSERT INTO news (title, content, cargroup, creator) VALUES (:title, :content, :cargroup, :creator)";
			$params = [
				':title' => $postData['title'],
				':content' => $postData['content'],
				':cargroup' => $postData['cargroup'],
				':creator' => $postData['creator']
			];
			require_once DATABASE_CONTROLLER;
			if(!executeDML($query, $params)) {
				echo "Hiba az adatbevitel során!";
			} header('Location: index.php?P=news');
		}
	}
?>
<div class="background2">
<h1 class="footer"><center>Új tartalom</center></h1>
<form method="post">
  <div class="form-group">
    <label for="exampleFormControlTextarea1" class="footer">Add meg az új tartalom címét!</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" name="title"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1" class="footer">Add meg a tartalmat! Max 1024 karakter</label>
    <textarea class="form-control" id="exampleFormControlTextarea2" rows="6" name="content"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1" class="footer">Add meg a tartalom csoportját</label>
    <select class="form-control" id="exampleFormControlSelect1" name="cargroup">
      <option>japan</option>
      <option>europai</option>
      <option>amerikai</option>
    </select>
  <button type="submit" class="btn btn-primary bg-dark" name="addContent" style="margin-top: 32px">feltöltés</button>
</form>
</div>
<?php endif; ?>