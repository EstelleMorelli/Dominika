<div class="infos-pratiques-container">
    
    <div class="article--text">
        <h2 class="article--title"> INFORMATIONS PRATIQUES </h2>
        <h3 class="article--subtitle"> Contact : </h3>
        <img src="images/phone.png" class="contact-logo"> <strong> 06.16.22.24.11 </strong> </br>
        <img src="images/email.png" class="contact-logo"> <a href="mailto:contact@dominika-meno.fr">contact@dominika-meno.fr</a>
    </div>

<?php if (isset($_SESSION['firstname'])){ ?> 
    <div class="form-container">
        <?php } ?>

        <div class="article--text">
        <h3 class="article--subtitle"> Tarifs posturologie : </h3>
<?php
    foreach($pricesList as $key => $currentPrice){
        if (str_contains($currentPrice['title'], "postural")){
            if (isset($_SESSION['firstname'])){ ?> 
                <form action="<?="/prices/{$currentPrice['id']}"?>" method="POST" class="price-update-form">
                <input type="text" id="price--title" name="price--title" required minlength="1" maxlength="50" size="15" value="<?= htmlspecialchars_decode($currentPrice['title']) ?>"/>
                <input type="text" id="price--duration" name="price--duration" required minlength="1" maxlength="50" size="5" value="<?= htmlspecialchars_decode($currentPrice['duration']) ?>"/>
                <input type="text" id="price--amount" name="price--amount" required minlength="1" maxlength="50" size="2" value="<?= htmlspecialchars_decode($currentPrice['amount']) ?>"/>
                <input type="text" id="price--currency" name="price--currency" required minlength="1" maxlength="50" size="2" value="<?= htmlspecialchars_decode($currentPrice['currency']) ?>"/>
                <button type="submit">Valider</button>
                </form>
                <a class="nav--menu__link-article deleteLink" href="<?= $router->generate('price-delete', ['priceId'=>$currentPrice['id']]);?>"> Supprimer ce tarif </a>
            <?php } else { ?>
                <h4><?=$currentPrice['title'].' ('.$currentPrice['duration'].') :';?></h4> <?=round($currentPrice['amount']) .' '. $currentPrice['currency'];?>
            <?php }
        }
    }
?>
        </div>
 
        <div class="article--text">
        <h3 class="article--subtitle"> Tarifs coaching à domicile : </h3> 
        <ul>
<?php
    foreach($pricesList as $key => $currentPrice){
        if (str_contains($currentPrice['title'], "coaching")){
            if (isset($_SESSION['firstname'])){ ?> 
                <form action="<?="/prices/{$currentPrice['id']}"?>" method="POST" class="price-update-form">
                <input type="text" id="price--title" name="price--title" required minlength="1" maxlength="50" size="15" value="<?= htmlspecialchars_decode($currentPrice['title']) ?>"/>
                <input type="text" id="price--duration" name="price--duration" required minlength="1" maxlength="50" size="5" value="<?= htmlspecialchars_decode($currentPrice['duration']) ?>"/>
                <input type="text" id="price--amount" name="price--amount" required minlength="1" maxlength="50" size="2" value="<?= htmlspecialchars_decode($currentPrice['amount']) ?>"/>
                <input type="text" id="price--currency" name="price--currency" required minlength="1" maxlength="50" size="2" value="<?= htmlspecialchars_decode($currentPrice['currency']) ?>"/>
                <button type="submit">Valider</button>
                </form>
                <a class="nav--menu__link-article deleteLink" href="<?= $router->generate('price-delete', ['priceId'=>$currentPrice['id']]);?>"> Supprimer ce tarif </a>
            <?php } else { ?>
                <li><?=$currentPrice['duration'].' : '. round($currentPrice['amount']) .' '. $currentPrice['currency'];?> </li>
            <?php }
        }
    }
?>
        </ul>
        </div>

<?php
    if (isset($_SESSION['firstname'])){ ?> 
    <div class="article--text">
        <form action="<?="/price/ajouter"?>" method="POST" class="price-update-form">
            <h2 class="form-title">Ajouter un nouveau tarif :</h2>
            <div class="form-group">
            <label for="price--title">Intitulé du tarif : </label>
            <input type="text" id="price--title" name="price--title" required minlength="1" maxlength="50" size="15" placeholder="Bilan postural"/>
            </div>
            <div class="form-group">
            <label for="price--duration">Durée associée :</label>
            <input type="text" id="price--duration" name="price--duration" required minlength="1" maxlength="50" size="5" placeholder="1h"/>
            </div>
            <div class="form-group">
            <label for="price--amount">Montant :</label>
            <input type="text" id="price--amount" name="price--amount" required minlength="1" maxlength="50" size="2" placeholder="60.00"/>
            </div>
            <div class="form-group">
            <label for="price--currency">Devise :</label>
            <input type="text" id="price--currency" name="price--currency" required minlength="1" maxlength="50" size="2" placeholder="euros"/>
            </div>
            <button type="submit" class="submit-btn">Valider</button>
        </form>
    </div>
    <?php }
    if (isset($_SESSION['firstname'])){?> 
    </div>
    <?php }
?>
    <div class="article--text"> 
        <h3 class="article--subtitle"> Déroulement d’un <strong> bilan </strong> postural: </h3>
        <ul>
            <li> Questionnement du patient (5-10 min)</li>
            <li> Analyse de la posture (en sous-vêtement ou habits très moulant) (40-60 min)</li>
            <li> Diagnostique (5min)</li>
            <li> Proposition du traitement (10-15 min)</li>
        </ul>
    </div>
    <div class="article--text"> 
        <h3 class="article--subtitle"> Déroulement d'un <strong> suivi </strong> postural: </h3>
        <ul>
            <li> Questionnement du patient (5 min)</li>
            <li> Analyse de la posture avec les corrections (15min)</li>
            <li> Ajustement du traitement (10min)</li>
        </ul>
    </div>
</div>

<?php /*
require_once __DIR__ . '\form.tpl.php'
*/
?>