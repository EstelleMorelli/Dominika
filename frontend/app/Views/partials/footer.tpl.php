    <script src="<?= $baseUri ?>scripts\script.js"></script>
</body>
<footer>
<div class="footer adress appear">
<img src="<?= $baseUri ?>images\DominikaMenoLogoPrincipal.png" alt="Dominika Meno" class="logoDominika">
    145 Rue Regard </br>
    39000 Lons-le-Saunier </br>
</br>
<div> Retrouvez moi sur les réseaux sociaux : <a class="socialmedia--link" target="_blank" href="https://www.instagram.com/dominika_meno/"> <img class="socialmedia" alt="lien vers instagram" src="<?= $baseUri ?>images\instagram-logo.png"> </a> </div>
</div>
<div class="footer menu--main appear">
    <strong> Menu Principal </strong>
    <ul>
    <li><a class="footer-nav" href="<?= $router->generate('main-home');?>">Accueil</a></li>
    <?php foreach ($articlesNavDedicated as $key => $currentArticle):?>
      <li> <a class="footer-nav" href="<?= $router->generate('article-detail', ['articleSlug'=>$currentArticle['slug']]);?>"><?=htmlspecialchars_decode($currentArticle['title'])?></a></li>
      <?php endforeach; ?>
    <li><a class="footer-nav" href="<?= $router->generate('main-infos-pratiques');?>">Infos Pratiques et Contact</a></li>
    </ul>
</div>
<div class="footer menu--articles appear">
    <strong> Articles </strong>
    <ul>
    <?php foreach ($articlesListArticles as $key => $currentArticle):?>
      <li class="menu--item"><a class="footer-nav" href="<?= $router->generate('article-detail', ['articleSlug'=>$currentArticle['slug']]);?>"><?=htmlspecialchars_decode($currentArticle['title'])?></a></li>
      <?php endforeach; ?>
    </ul>
</div>
<div class="footer developer">
<strong> Conception : </strong> <a class="footer-nav" href="mailto:dev.morelliestelle@gmail.com">Estelle MORELLI</a></br>
<a class="footer-nav" href="<?= $router->generate('admin-login-page');?>">Espace Administrateur</a>
</div>
</footer>
</html>