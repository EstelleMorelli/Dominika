    <script src="<?= $baseUri ?>scripts\script.js"></script>
</body>
<footer>
<div class="footer adress appear">
<img src="<?= $baseUri ?>images\DominikaMenoLogoPrincipal.png" alt="Dominika Meno" class="logoDominika">
    145 Rue Regard </br>
    39000 Lons-le-Saunier </br>
</div>
<div class="footer menu--main appear">
    <strong> Menu Principal </strong>
    <ul>
    <li><a href="<?= $router->generate('main-home');?>">Accueil</a></li>
    <li><a href="<?= $router->generate('main-about');?>">Qui suis-je ?</a></li>
    <li><a href="<?= $router->generate('posturologie');?>">La Posturologie</a></li>
    <li><a href="<?= $router->generate('main-infos-pratiques');?>">Infos Pratiques et Contact</a></li>
    </ul>
</div>
<div class="footer menu--articles appear">
    <strong> Articles </strong>
    <ul>
    <li class="menu-item"><a href="<?= $router->generate('difficultes-scolaires');?>">Problèmes d'apprentissage</a></li>
    <li class="menu-item"><a href="<?= $router->generate('douleurs-persistantes');?>">Douleurs peristantes</a></li>
    <li class="menu-item"><a href="<?= $router->generate('hernie-discale');?>">Prévention des blessures</a></li>
    <li class="menu-item"><a href="<?= $router->generate('performance');?>">Potentiel de performance</a></li>
    <li class="menu-item"><a href="<?= $router->generate('coaching');?>">Coaching sportif</a></li>
    <li class="menu-item"><a href="<?= $router->generate('maux-de-tete');?>">Maux de tête & vertiges</a></li>
    </ul>
</div>
<div class="footer developer">
<strong> Conception : </strong> <a href="mailto:dev.morelliestelle@gmail.com">Estelle MORELLI</a>
</div>
</footer>
</html>