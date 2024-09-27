<?php 
if (isset($actionMsg) && $actionMsg!=""){
  echo $actionMsg; 
}

if (isset($_SESSION['firstname'])){
  ?> 
  <article>
  <img class="article--picture" src="/../images/<?=$articlePicture?>" alt="<?=$articleTitle?>"/>
    <form class="article--update" action="<?= isset($articleId) ? "/articles/$articleId" : "/article/ajouter" ?>" method="POST" enctype="multipart/form-data">
    <label for="article--picture">Modifier l'image de l'article :</label>
    <input type="file" name="article--picture" id="article--picture">
    <div class="article--titleandtext"> 
    <label for="article--title">Dénomination de l'article (ce qui sera visible dans le menu):</label>
    <input type="text" id="article--title" name="article--title" required minlength="1" maxlength="255" size="80" value="<?= htmlspecialchars_decode($articleTitle) ?>"/>
</br>
    <label for="article--title">Titre de l'article:</label>
    <input type="text" id="article--subtitle" name="article--subtitle" required minlength="1" maxlength="255" size="80" value="<?= htmlspecialchars_decode($articleSubtitle) ?>"/>
</br>
    <label for="article--text">Texte de l'article:</label>
    <textarea id="article--text" name="article--text" required minlength="1" maxlength="65000"> <?= htmlspecialchars_decode($articleContent) ?> </textarea>
    <button type="submit">Valider</button>
    </form>
    <?php
    if (isset($_SESSION['firstname']) && isset($articleId)):?>
      <a class="nav--menu__link-article addLink" href="<?= $router->generate('article-delete', ['articleId'=>$articleId]);?>"> Supprimer cet article </a>
      <?php endif; ?> 
</div>
  </article>
  <?php
} else {
  ?>
<article> 
      <img class="article--picture" src="/../images/<?=$articlePicture?>" alt="<?=$articleTitle?>"/>
      <div class="article--titleandtext">
    <h2 class="article--title">
  <?= htmlspecialchars_decode($articleTitle) ?>
    </h2>
    <p class="article--text">
    <?= htmlspecialchars_decode($articleContent) ?>
    </p>
</div>
</article>
<?php
}
?>