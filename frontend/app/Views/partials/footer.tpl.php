    <script src="<?= $baseUri ?>scripts\script.js"></script>
    <script src="<?= $baseUri ?>scripts\admin.js"></script>
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
    <li><a href="<?= $router->generate('article-detail', ['articleSlug'=>"posturologie"]);?>">La Posturologie</a></li>
    <li><a href="<?= $router->generate('main-infos-pratiques');?>">Infos Pratiques et Contact</a></li>
    </ul>
</div>
<div class="footer menu--articles appear">
    <strong> Articles </strong>
    <ul>
    <?php foreach ($articlesList as $key => $currentArticle):?>
      <li class="menu--item"><a href="<?= $router->generate('article-detail', ['articleSlug'=>$currentArticle['slug']]);?>"><?=$currentArticle['title']?></a></li>
      <?php endforeach; ?>
    </ul>
</div>
<div class="footer developer">
<strong> Conception : </strong> <a href="mailto:dev.morelliestelle@gmail.com">Estelle MORELLI</a></br>
<a href="<?= $router->generate('admin-login-page');?>">Espace Administrateur</a>
</div>
</footer>
</html>