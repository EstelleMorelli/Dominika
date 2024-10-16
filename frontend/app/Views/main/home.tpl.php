<?php
require_once __DIR__ . '/../../../public/functions/formatTextToParagraphsHome.php';
require_once __DIR__ . '/../../../public/functions/formatTextToParagraphs.php';
require_once __DIR__ . '/../../../public/functions/truncateByWords.php';
$mindmapCoord = require __DIR__ . '/../../../public/datas/mindmap-coord.php';
?> 
<?php foreach ($articlesHomePage as $key => $currentArticle):?>
    <div class="article home">
        <div class="article titleandintro">
            <h2 class="article title" ><?=htmlspecialchars_decode($currentArticle['subtitle'])?> </h2>
            <p class="article intro">
                <?php 
                // Appel de la fonction et affichage du contenu formaté
                echo formatTextToParagraphs($currentArticle['content']);
                ?> 
            </p>
        </div>
        <img class="article photo" src="/../images/<?=$currentArticle['picture']?>" alt="<?=htmlspecialchars_decode($currentArticle['title'])?>">
    </div>
<?php endforeach; ?>

<?php foreach ($articlesNavDedicated as $key => $currentArticle):?>
    <div class="article home">
        <div class="article titleandintro">
            <h2 class="article title" ><?=htmlspecialchars_decode($currentArticle['title'])?> </h2>
                <?php 
                // Appel de la fonction et affichage du contenu formaté
                echo truncateByWords(formatTextToParagraphsHome($currentArticle['content']), 50);
                ?> 
            </p>
        </div>
        <img class="article photo" src="/../images/<?=$currentArticle['picture']?>" alt="<?=htmlspecialchars_decode($currentArticle['title'])?>">
        <a class="readmore" href="<?= $router->generate('article-detail', ['articleSlug'=>$currentArticle['slug']]);?>"> Lire la suite </a>
    </div>
<?php endforeach; ?>


<div class="mindmap--container" style="position: relative;">
<img class="mindmapimg" src="/../images/mindmap.webp" alt="Image" usemap="#cerclesMap">

<div alt="Hernie discale" class="circle" style="top: 6.3%; left: 26.1%; width: 19%; height: 20.2%;" onclick="window.location.href='<?= $router->generate('article-detail', ['articleSlug'=>"hernie-discale"]);?>'"></div>
<div alt="Difficultés scolaires" class="circle" style="top: 9%; left: 64%; width: 21.7%; height: 23.9%;" onclick="window.location.href='<?= $router->generate('article-detail', ['articleSlug'=>"difficultes-scolaires"]);?>'"></div>
<div alt="Posturologie" class="circle" style="top: 32.1%; left: 33.8%; width: 32.5%; height: 35.8%;" onclick="window.location.href='<?= $router->generate('article-detail', ['articleSlug'=>"posturologie"]);?>'"></div>
<div alt="Maux de tête" class="circle" style="top: 40%; left: 11%; width: 19%; height: 20.5%;" onclick="window.location.href='<?= $router->generate('article-detail', ['articleSlug'=>"maux-de-tete"]);?>'"></div>
<div alt="Performance" class="circle" style="top: 72.5%; left: 11.5%; width: 19%; height: 20.5%;" onclick="window.location.href='<?= $router->generate('article-detail', ['articleSlug'=>"performance"]);?>'"></div>
<div alt="Douleur persistante" class="circle" style="top: 62%; left: 70.5%; width: 19%; height: 20.5%;" onclick="window.location.href='<?= $router->generate('article-detail', ['articleSlug'=>"douleurs-persistantes"]);?>'"></div>

</div>


<div class="mindmap--container__test" style="position: relative">
<div alt="Hernie discale" class="circle"  
    style="
    top: 6.3%; left: 26.1%; width: 80px; height: 80px; 
    background-image: url('/../images/hernie-discale.webp');
    background-size: cover;
    background-position: center;
    position: absolute;
    cursor: pointer;"
    onclick="window.location.href='<?= $router->generate('article-detail', ['articleSlug'=>"hernie-discale"]);?>'"></div>
<div alt="Difficultés scolaires" class="circle" 
    style="
    top: 9%; left: 64%; width: 80px; height: 80px;
    background-image: url('/../images/difficultes-scolaires.jpg');
    background-size: cover;
    background-position: center;
    position: absolute;
    cursor: pointer;" 
    onclick="window.location.href='<?= $router->generate('article-detail', ['articleSlug'=>"difficultes-scolaires"]);?>'">
</div>
<div alt="Posturologie" class="circle" 
    style="
    top: 32.1%; left: 33.8%; width: 120px; height: 120px;
    background-image: url('/../images/posturologie.webp');
    background-size: cover;
    background-position: center;
    position: absolute;
    cursor: pointer;" 
    onclick="window.location.href='<?= $router->generate('article-detail', ['articleSlug'=>"posturologie"]);?>'">
</div>
<div alt="Maux de tête" class="circle" 
    style="
    top: 40%; left: 5%; width: 80px; height: 80px;
    background-image: url('/../images/migraine.webp');
    background-size: cover;
    background-position: center;
    position: absolute;
    cursor: pointer;" 
    onclick="window.location.href='<?= $router->generate('article-detail', ['articleSlug'=>"maux-de-tete"]);?>'">
</div>
<div alt="Performance" class="circle" 
    style="
    top: 72.5%; left: 11.5%; width: 80px; height: 80px;
    background-image: url('/../images/performance.webp');
    background-size: cover;
    background-position: center;
    position: absolute;
    cursor: pointer;" 
    onclick="window.location.href='<?= $router->generate('article-detail', ['articleSlug'=>"performance"]);?>'">
</div>
<div alt="Douleur persistante" class="circle" 
    style="
    top: 62%; left: 70.5%; width: 80px; height: 80px;
    background-image: url('/../images/douleurs-persistantes.png');
    background-size: cover;
    background-position: center;
    position: absolute;
    cursor: pointer;" 
    onclick="window.location.href='<?= $router->generate('article-detail', ['articleSlug'=>"douleurs-persistantes"]);?>'">
</div>

</div>

<div class="mindmap--container__test" style="position: relative">
<?php     
    // Initialisation du compteur pour suivre l'index des coordonnées
    $coordIndex = 1;
    // Boucle sur les articles
    foreach ($articlesListArticles as $currentArticle):
        // Si on a une entrée pour cette clé dans $mindmapCoord
        if (isset($mindmapCoord[$coordIndex])) {
            $top = $mindmapCoord[$coordIndex]['top'];
            $left = $mindmapCoord[$coordIndex]['left'];
        } else {
            // Valeurs par défaut si pas de coordonnées correspondantes
            $top = '0%';
            $left = '0%';
        }
?>
    <div alt="<?=$currentArticle['title']?>" class="circle" 
        style="
        top: <?=$top?>; 
        left: <?=$left?>; 
        width: 80px; 
        height: 80px;
        background-image: url('/../images/<?=$currentArticle['picture']?>');
        background-size: cover;
        background-position: center;
        position: absolute;
        cursor: pointer;" 
        onclick="window.location.href='<?= $router->generate('article-detail', ['articleSlug'=>$currentArticle['slug']]);?>'">
    </div>
<?php 
    // Incrémentation du compteur pour le prochain article
    $coordIndex++;
    endforeach; 
?>
</div>

<div class="contact-btn-container">
<a href="mailto:contact@dominika-meno.fr" class="contact-btn"> Je veux faire mon bilan postural </a>
</div>