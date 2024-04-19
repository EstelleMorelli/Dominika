<nav class="menu">
  <ol>
    <li class="menu-item"><a href="<?= $router->generate('main-home');?>">Accueil</a></li>
    <li class="menu-item"><a href="<?= $router->generate('main-about');?>">A propos de moi</a></li>
    <li class="menu-item">
      <a href="#0">Coach Sportif</a>
      <ol class="sub-menu">
        <li class="menu-item"><a href="<?= $router->generate('coaching-definition');?>">Qu'est ce que le coaching sportif ?</a></li>
        <li class="menu-item"><a href="<?= $router->generate('coaching-needed');?>">Quand faire appel a un coach ?</a></li>
        <li class="menu-item"><a href="<?= $router->generate('coaching-session');?>">Comment se déroule une séance ?</a></li>
      </ol>
    </li>
    <li class="menu-item">
      <a href="#0">Posturologue</a>
      <ol class="sub-menu">
        <li class="menu-item"><a href="<?= $router->generate('posturologie-definition');?>">Qu'est ce que la posturologie ?</a></li>
        <li class="menu-item"><a href="<?= $router->generate('posturologie-needed');?>">Quand faire appel a un posturologue ?</a></li>
        <li class="menu-item"><a href="<?= $router->generate('posturologie-session');?>">Comment se déroule une séance ?</a></li>
      </ol>
    </li>
    <li class="menu-item"><a href="<?= $router->generate('main-contact');?>">Contact</a></li>
  </ol>
</nav>