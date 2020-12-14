<nav class="navbar navbar-expand-sm background3 navbar-dark">
  <a class="navbar-brand" href="#">Menü</a>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Főoldal</a>
      </li>
    <?php if(!IsUserLoggedIn()) :?>
      <li class="nav-item">
        <a class="nav-link" href="index.php?P=login">Bejelentkezés</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?P=register">Regisztráció</a>
      </li>
    <?php else :?>
      <li class="nav-item">
        <a class="nav-link" href="index.php?P=news">Hírek</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?P=profile">Profil</a>
      </li>
      <?php if(isset($_SESSION['permission']) && $_SESSION['permission'] >= 1) : ?>
  <a class="navbar-brand" href="#">&nbsp;|&nbsp;Admin panel</a>
      <li class="nav-item">
        <a class="nav-link" href="index.php?P=user_list">Felhasználók</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?P=add_content">új tartalom</a>
      </li>  
      <?php endif ;?>
      <li class="nav-item">
        <a class="nav-link" href="index.php?P=logout">Kijelentkezés</a>
      </li>
    <?php endif ;?>   
    </ul>
  </div>  
</nav>



