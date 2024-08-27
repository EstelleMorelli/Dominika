<div class="overlay-nav-mobile">
</div>
  <div class="nav">
  <div class="nav--logoandname">
    <div  class="nav--logo">
      <img src="<?= $baseUri ?>images\DominikaMenoPictoClair.png" alt="Dominika Meno">
    </div>
    <div class="nav--name">
      DOMINIKA MENO
  </div>
</div>
  <nav class="nav--menu">
    <div class="nav--menu__close">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#e0ccbe" d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z"/></svg>
    </div>
    <ul class="nav--menu__link-list">
      <li class="nav--menu__link"><a href="<?= $router->generate('main-home');?>">Accueil</a></li>
      <li class="nav--menu__link"><a href="<?= $router->generate('main-about');?>">Qui suis-je ?</a></li>
      <li class="nav--menu__link"><a href="<?= $router->generate('posturologie');?>">La Posturologie</a></li>
      <ul class="nav--menu__link-list-articles">
      <div class="nav-menu__link-list-title"> <strong> Articles </strong></div>
      <li class="nav--menu__link-article"><a href="<?= $router->generate('difficultes-scolaires');?>">Problèmes d'apprentissage</a></li>
      <li class="nav--menu__link-article"><a href="<?= $router->generate('douleurs-persistantes');?>">Douleurs peristantes</a></li>
      <li class="nav--menu__link-article"><a href="<?= $router->generate('hernie-discale');?>">Prévention des blessures</a></li>
      <li class="nav--menu__link-article"><a href="<?= $router->generate('performance');?>">Potentiel de performance</a></li>
      <li class="nav--menu__link-article"><a href="<?= $router->generate('coaching');?>">Coaching sportif</a></li>
      <li class="nav--menu__link-article"><a href="<?= $router->generate('maux-de-tete');?>">Maux de tête & vertiges</a></li>
      </ul>
      <li class="nav--menu__link last"><a href="<?= $router->generate('main-infos-pratiques');?>">Infos pratiques</a></li>
    </ul>
  </nav>
  <div class="nav--burger">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#e0ccbe" d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z"/></svg>
  </div>
</div>
