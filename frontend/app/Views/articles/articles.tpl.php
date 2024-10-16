<?php 
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
    <div class="checkbox--localisation">
        <input type="checkbox" id="localisation1" name="article--localisation[]" value="1"  <?php if(isset($articleLocalisations)){if(in_array(1, array_column($articleLocalisations, 'id'))) echo 'checked';} ?> >
        <label for="localisation0">Lien de navigation dédié</label></br>
        <input type="checkbox" id="localisation2" name="article--localisation[]" value="2" <?php if(isset($articleLocalisations)){if(in_array(2, array_column($articleLocalisations, 'id'))) echo 'checked';} ?> >
        <label for="localisation1">Page d'accueil</label></br>
        <input type="checkbox" id="localisation3" name="article--localisation[]" value="3" <?php if(isset($articleLocalisations)){if(in_array(3, array_column($articleLocalisations, 'id'))) echo 'checked';} ?>>
        <label for="localisation2">Lien dans la section "Articles"</label></br>
    </div>
    <button type="submit">Valider</button>
    </form>
    <?php
    if (isset($_SESSION['firstname']) && isset($articleId)):?>
      <a class="nav--menu__link-article deleteLink" href="<?= $router->generate('article-delete', ['articleId'=>$articleId]);?>"> Supprimer cet article </a>
      <?php endif; ?> 
</div>
  </article>
  <?php
} else {
  echo ($articleSlug === 'apropos') ? '<article class="personnal-presentation">' : '<article>';
  ?>
      <img class="article--picture" src="/../images/<?=$articlePicture?>" alt="<?=$articleTitle?>"/>
      <div class="article--titleandtext">
    <h2 class="article--title">
  <?= htmlspecialchars_decode($articleSubtitle) ?>
    </h2>

  <?php 
function formatTextToParagraphs($text) {
  // Convertir les entités HTML en caractères normaux
  $text = htmlspecialchars_decode($text);
  // Remplacer les entités &#13;&#10; (retour à la ligne Windows) par de vrais sauts de ligne
  $text = str_replace(['&#13;&#10;', '&#10;', '&#13;'], "\n", $text);
  // Remplacer les doubles sauts de ligne (marqueurs de paragraphes) par le marqueur ### si besoin
  $text = preg_replace("/\n{2,}/", '###', $text);
  // Remplacer les simples retours à la ligne (\n) par des balises <br> pour conserver les sauts de ligne
  $text = str_replace("\n", "<br>", $text);
  // Ajouter les balises <p> autour des paragraphes
  $paragraphs = '<p class="article--text">' . str_replace('###', '</p><p class="article--text">', $text) . '</p>';
  return $paragraphs;
}
// Appel de la fonction et affichage du contenu formaté
echo formatTextToParagraphs($articleContent);
?>
</div>
</article>
<?php
}
?>