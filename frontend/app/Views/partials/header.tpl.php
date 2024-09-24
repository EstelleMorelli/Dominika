<html lang="fr"> 
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="Cache-Control" content="max-age=604800, must-revalidate">
        <meta property="og:title" content="Dominika Meno, Coach Sportif & Posturologue">
        <meta property="og:description" content="J'accompagne les autres à travers le mouvement pour les aider à se sentir mieux, tant physiquement que mentalement.">
        <title>DOMINIKA MENO</title>

        <link rel="stylesheet" href="<?= $baseUri ?>css/style_colors.css">
        <link rel="stylesheet" href="<?= $baseUri ?>css/style_background.css">
        <link rel="stylesheet" href="<?= $baseUri ?>css/style_article.css">
        <link rel="stylesheet" href="<?= $baseUri ?>css/style_form.css">
        <link rel="stylesheet" href="<?= $baseUri ?>css/style_nav.css">
        <link rel="stylesheet" href="<?= $baseUri ?>css/style_fonts.css">
        <link rel="stylesheet" href="<?= $baseUri ?>css/style_footer.css">
        <link rel="stylesheet" href="<?= $baseUri ?>css/style_mindmap.css">

    </head>

<body>

<?php 

if (isset($_SESSION['firstname'])) {
    echo 'Bonjour ' . $_SESSION['firstname'];
    ?>
    <form action="/logout" method="GET">
        <button type="submit">Se déconnecter</button>
    </form>
    <?php
}
?>
