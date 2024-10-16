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
?>