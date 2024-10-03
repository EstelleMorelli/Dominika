<?php

namespace App\Controllers;

class PricesController extends CoreController
{
            /**
     * Méthode s'occupant de l'affichage des infos pratiques
     *
     * @return void
     */
    public function infosPratiques()
    {
        require __DIR__ . '/../../public/api.php';
        //récupération de la liste des articles pour la nav
        $urlAPI = "{$api_url}/prices";
        $ch = curl_init($urlAPI);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);
        $response = curl_exec($ch);
        curl_close($ch);
        $response = trim($response);

        // Décodage de la réponse JSON
        $pricesList = json_decode($response, true);
        $this->show('main/infos-pratiques', ['pricesList'=>$pricesList]);
    }
    /**
     * Méthode s'occupant de l'affichage 
     *
     * @return void
     */
    public function priceUpdate($priceId)
    {
        require __DIR__ . '/../../public/api.php';
        $title = filter_input(INPUT_POST, 'price--title', FILTER_SANITIZE_SPECIAL_CHARS);
        $duration = filter_input(INPUT_POST, 'price--duration', FILTER_SANITIZE_SPECIAL_CHARS);
        $amount = filter_input(INPUT_POST, 'price--amount', FILTER_SANITIZE_SPECIAL_CHARS);
        $currency = filter_input(INPUT_POST, 'price--currency', FILTER_SANITIZE_SPECIAL_CHARS);
        $datas = [
            'title' => $title,
            'duration' => $duration,
            'amount' => $amount,
            'currency' => $currency
        ];

        $urlAPI = "{$api_url}/prices/$priceId";
        $json_data = json_encode($datas);
        $ch = curl_init($urlAPI);
        // On configure la requête cURL 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);
        $response = curl_exec($ch);
        curl_close($ch);
        $response = trim($response);
        // Décodage de la réponse JSON
        $result = json_decode($response, true);   
        $_SESSION['actionMsg'] = "Le tarif a été modifié avec succès";
        // Redirection après la mise à jour
        header("Location: " . $this->router->generate('main-infos-pratiques'));
        exit; 
        }

      /**
     * Méthode s'occupant de la suppression d'un tarif
     *
     * @return void
     */
    public function priceDelete($priceId)
    {
        require __DIR__ . '/../../public/api.php';
        $urlAPI = "{$api_url}/prices/{$priceId}";
        $ch = curl_init($urlAPI);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);
        $response = curl_exec($ch);
        curl_close($ch);
        var_dump($response);
        $_SESSION['actionMsg'] = "Le tarif a été supprimé avec succès";
        // Redirection après la suppression
        header("Location: " . $this->router->generate('main-infos-pratiques'));
        exit;
    }

    /**
     * Méthode s'occupant de la soumission du formulaire d'ajout d'un nouvel article 
     *
     * @return void
     */
    public function priceAddPost()
    {
        require __DIR__ . '/../../public/api.php';
        $title = filter_input(INPUT_POST, 'price--title', FILTER_SANITIZE_SPECIAL_CHARS);
        $duration = filter_input(INPUT_POST, 'price--duration', FILTER_SANITIZE_SPECIAL_CHARS);
        $amount = filter_input(INPUT_POST, 'price--amount', FILTER_SANITIZE_SPECIAL_CHARS);
        $currency = filter_input(INPUT_POST, 'price--currency', FILTER_SANITIZE_SPECIAL_CHARS);
        $datas = [
            'title' => $title,
            'duration' => $duration,
            'amount' => $amount,
            'currency' => $currency
        ];
       
        $urlAPI = "{$api_url}/prices";
        $json_data = json_encode($datas);
        $ch = curl_init($urlAPI);
        // On configure la requête cURL pour envoyer un
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);
        $response = curl_exec($ch);
        curl_close($ch);
        $response = trim($response);
        // Décodage de la réponse JSON
        $result = json_decode($response, true);
        $_SESSION['actionMsg'] = "La prix a été ajouté avec succès";
        // Redirection après l'ajout
        header("Location: " . $this->router->generate('main-infos-pratiques'));
        exit;
    }
}