
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" integrity="sha256-ihAoc6M/JPfrIiIeayPE9xjin4UWjsx2mjW/rtmxLM4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="../scripts/script.js"></script>
</body>
<footer>
<div class="footer adress appear">
<img src="<?= $baseUri ?>images\DominikaMenoPictogrammeSeul.png" alt="Dominika Meno" class="logoDominika">
    Dominika Meno </br>
    145 Rue Regard </br>
    39000 Lons-le-Saunier </br>
</div>
<ul class="footer menu--main appear">
    Menu Principal
    <li><a href="<?= $router->generate('main-home');?>">Accueil</a></li>
    <li><a href="<?= $router->generate('main-about');?>">Qui suis-je ?</a></li>
    <li><a href="<?= $router->generate('posturologie');?>">La Posturologie</a></li>
    <li><a href="<?= $router->generate('main-contact');?>">Infos Pratiques et Contact</a></li>
</ul>
<ul class="footer menu--articles appear">
    Articles
    <li class="menu-item"><a href="<?= $router->generate('difficultes-scolaires');?>">Problèmes d'apprentissage</a></li>
    <li class="menu-item"><a href="<?= $router->generate('douleurs-persistantes');?>">Douleurs peristantes</a></li>
    <li class="menu-item"><a href="<?= $router->generate('hernie-discale');?>">Prévention des blessures</a></li>
    <li class="menu-item"><a href="<?= $router->generate('performance');?>">Potentiel de performance</a></li>
    <li class="menu-item"><a href="<?= $router->generate('coaching');?>">Coaching sportif</a></li>
    <li class="menu-item"><a href="<?= $router->generate('maux-de-tete');?>">Maux de tête & vertiges</a></li>
</ul>
<div class="footer developer">
    Conception : <a href="mailto:dev.morelliestelle@gmail.com">Estelle MORELLI</a>
</div>
</footer>
</html>