<?php
function truncateByWords($text, $wordLimit) {
    // Convertir le texte en tableau de mots
    $words = explode(' ', $text);

    // Vérifier si le nombre de mots dépasse la limite
    if (count($words) > $wordLimit) {
        // Couper le tableau de mots à la limite
        $words = array_slice($words, 0, $wordLimit);
        // Rejoindre les mots en une chaîne
        $truncatedText = implode(' ', $words) . '...'; // Ajoute des points de suspension
    } else {
        $truncatedText = $text; // Pas de coupure
    }

    return $truncatedText;
}
?>