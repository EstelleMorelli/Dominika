<?php 
var_dump($articleLocalisations);
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
        <input type="checkbox" id="localisation1" name="article--localisation[]" value="1"  <?php if(in_array(1, array_column($articleLocalisations, 'id'))) echo 'checked'; ?> >
        <label for="localisation0">Lien de navigation dédié</label></br>
        <input type="checkbox" id="localisation2" name="article--localisation[]" value="2" <?php if(in_array(2, array_column($articleLocalisations, 'id'))) echo 'checked'; ?> >
        <label for="localisation1">Page d'accueil</label></br>
        <input type="checkbox" id="localisation3" name="article--localisation[]" value="3" <?php if(in_array(3, array_column($articleLocalisations, 'id'))) echo 'checked'; ?>>
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
    // Séparer le texte en paragraphes basés sur des doubles sauts de ligne
    $paragraphs = preg_split('/\n\s*/', $text);
    
    // Commencer à construire le HTML
    $formattedText = '';
    
    // Parcourir chaque paragraphe et l'encapsuler dans des balises <p>
    foreach ($paragraphs as $paragraph) {
        // Nettoyer les espaces inutiles et les balises HTML
        $cleanedParagraph = trim($paragraph);
        // Vérifier si le paragraphe n'est pas vide
        if (!empty($cleanedParagraph)) {
            $formattedText .= '<p class="article--text">' . htmlspecialchars_decode($cleanedParagraph) . '</p>';
        }
    }
    return $formattedText;
  }
    echo formatTextToParagraphs(htmlspecialchars_decode($articleContent));
?>
</div>
</article>
<?php
}
?>