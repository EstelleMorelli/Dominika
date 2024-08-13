<nav class="nav">
  <div class="wrapper">


    <!--<img src="images/Dlogo1.png" alt="Logo" class="logoDominika">
    <img src="images/Dlogo2.png" alt="Logo" class="logoDominika">
    <img src="images/Dlogo3.png" alt="Logo" class="logoDominika">-->
    <div class="logo-and-name"> 
      <img src="<?= $baseUri ?>images\DominikaMenoPictoClair.png" alt="Dominika Meno" class="logoDominika">
       <div class="name"><a href="#">DOMINIKA MENO</a></div>
    </div>
    <input type="radio" name="slider" id="menu-btn">
    <input type="radio" name="slider" id="close-btn">
    <ul class="nav-links">
      <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
      <li><a href="<?= $router->generate('main-home');?>">Accueil</a></li>
      <li><a href="<?= $router->generate('main-about');?>">Qui suis-je ?</a></li>
      <li><a href="<?= $router->generate('posturologie');?>">La Posturologie</a></li>
      <li>
        <a href="#" class="desktop-item">Articles</a>
        <input type="checkbox" id="showDrop">
        <label for="showDrop" class="mobile-item">Articles </label>
        <ul class="drop-menu">
        <li class="menu-item"><a href="<?= $router->generate('difficultes-scolaires');?>">Problèmes d'apprentissage</a></li>
        <li class="menu-item"><a href="<?= $router->generate('douleurs-persistantes');?>">Douleurs peristantes</a></li>
        <li class="menu-item"><a href="<?= $router->generate('hernie-discale');?>">Prévention des blessures</a></li>
        <li class="menu-item"><a href="<?= $router->generate('performance');?>">Potentiel de performance</a></li>
        <li class="menu-item"><a href="<?= $router->generate('coaching');?>">Coaching sportif</a></li>
        <li class="menu-item"><a href="<?= $router->generate('maux-de-tete');?>">Maux de tête & vertiges</a></li>
        </ul>
      </li>
      <li><a href="<?= $router->generate('main-contact');?>">Infos pratiques</a></li>
      
     
    </ul>
    <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
  </div>
</nav>


