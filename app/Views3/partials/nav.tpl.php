<nav class="nav">
  <div class="wrapper">
    <div class="logo"><a href="#">DOMINIKA</a></div>
    <input type="radio" name="slider" id="menu-btn">
    <input type="radio" name="slider" id="close-btn">
    <ul class="nav-links">
      <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
      <li><a href="<?= $router->generate('main-home');?>">Accueil</a></li>
      <li><a href="<?= $router->generate('main-about');?>">A propos de moi</a></li>
      <li><a href="<?= $router->generate('main-contact');?>">Contact</a></li>
      <li>
        <a href="#" class="desktop-item">Coach sportif</a>
        <input type="checkbox" id="showDrop">
        <label for="showDrop" class="mobile-item">Coach sportif</label>
        <ul class="drop-menu">
        <li class="menu-item"><a href="<?= $router->generate('coaching-definition');?>">Définition</a></li>
        <li class="menu-item"><a href="<?= $router->generate('coaching-needed');?>">Quand consulter</a></li>
        <li class="menu-item"><a href="<?= $router->generate('coaching-session');?>">Déroulement</a></li>
        </ul>
      </li>
      <li>
        <a href="#" class="desktop-item">Posturologue</a>
        <input type="checkbox" id="showDrop">
        <label for="showDrop" class="mobile-item">Posturologue</label>
        <ul class="drop-menu">
        <li class="menu-item"><a href="<?= $router->generate('posturologie-definition');?>">Définition</a></li>
        <li class="menu-item"><a href="<?= $router->generate('posturologie-needed');?>">Quand consulter</a></li>
        <li class="menu-item"><a href="<?= $router->generate('posturologie-session');?>">Déroulement</a></li>
        </ul>
      </li>
    </ul>
    <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
  </div>
</nav>


