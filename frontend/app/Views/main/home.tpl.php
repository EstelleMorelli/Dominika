<?php
require_once __DIR__ . '/../../../public/functions/formatTextToParagraphsHome.php';
require_once __DIR__ . '/../../../public/functions/formatTextToParagraphs.php';
require_once __DIR__ . '/../../../public/functions/truncateByWords.php';
switch(count($articlesListArticles)) {
    case 4:
        $mindmapCoord = require __DIR__ . '/../../../public/datas/mindmap-coord_4.php';
        break;
    case 5:
        $mindmapCoord = require __DIR__ . '/../../../public/datas/mindmap-coord_5.php';
        break;
    case 6:
        $mindmapCoord = require __DIR__ . '/../../../public/datas/mindmap-coord_6.php';
        break;
    case 7:
        $mindmapCoord = require __DIR__ . '/../../../public/datas/mindmap-coord_7.php';
        break;
    case 8:
        $mindmapCoord = require __DIR__ . '/../../../public/datas/mindmap-coord_8.php';
    break;
}

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

<div class="mindmap--container__mobile" style="position: relative">
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
    <!-- Cercle avec texte incurvé -->
    <svg class="curved-text" style="--top: <?=$top?>; --left: <?=$left?>;"> 
        <defs>
            <!-- Définir un cercle invisible pour le texte -->
            <path id="circlePath<?=$coordIndex?>" d="M 60, 60 m -50, 0 a 50,50 0 1,1 100,0 a 50,50 0 1,1 -100,0" />
        </defs>
        
        <!-- Texte incurvé sur le chemin -->
        <text font-size="11" text-anchor="middle" fill="black" letter-spacing="1">
            <!-- Ajuster l'orientation du texte sur la droite -->
            <textPath href="#circlePath<?=$coordIndex?>" startOffset="25%" method="<?= ($left > '50%') ? 'stretch' : 'align' ?>" side="<?= ($left > '50%') ? 'right' : 'left' ?>">
                <?=htmlspecialchars_decode($currentArticle['title'])?>
            </textPath>
        </text>
    </svg>
        <!-- Cercle avec image en background -->
    <div alt="<?=$currentArticle['title']?>" class="circle" 
        style="
        top: <?=$top?>; 
        left: <?=$left?>; 
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
    <div alt="posturologie" class="circle" 
        style="
        width: 120px;
        height: 120px;
        top: 31%; 
        left: 31%;
        background-image: url('/../images/posturologie.webp');
        background-size: cover;
        background-position: center;
        position: absolute;
        cursor: pointer;" 
        onclick="window.location.href='<?= $router->generate('article-detail', ['articleSlug'=>'posturologie']);?>'">
    </div>
</div>

<div class="mindmap--container__desktop" style="position: relative">
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
    <!-- Cercle avec texte incurvé -->
    <svg class="curved-text" style="--top: <?=$top?>; --left: <?=$left?>;"> 
        <defs>
            <!-- Définir un cercle invisible pour le texte -->
            <path id="circlePath1<?=$coordIndex?>" d="M 172.5, 172.5 m -160, 0 a 160,160 0 1,1 320,0 a 160,160 0 1,1 -320,0" />

        </defs>
        
        <!-- Texte incurvé sur le chemin -->
        <text font-size="21" text-anchor="middle" fill="black" letter-spacing="1">
            <!-- Ajuster l'orientation du texte sur la droite -->
            <textPath href="#circlePath1<?=$coordIndex?>" startOffset="25%">
                <?=htmlspecialchars_decode($currentArticle['title'])?>
            </textPath>
        </text>
    </svg>
    
    <!-- Cercle avec image en background -->
    <div alt="<?=$currentArticle['title']?>" class="circle" 
        style="
        top: <?=$top?>; 
        left: <?=$left?>; 
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
    <div alt="posturologie" class="circle" 
        style="
        width: 350px;
        height: 350px;
        top: 33%; 
        left: 33%;
        background-image: url('/../images/posturologie.webp');
        background-size: cover;
        background-position: center;
        position: absolute;
        cursor: pointer;" 
        onclick="window.location.href='<?= $router->generate('article-detail', ['articleSlug'=>'posturologie']);?>'">
    </div>
</div>


<div class="contact-btn-container">
<a href="mailto:contact@dominika-meno.fr" class="contact-btn"> Je veux faire mon bilan postural </a>
</div>