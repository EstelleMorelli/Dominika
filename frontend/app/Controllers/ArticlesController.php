<?php

namespace App\Controllers;

class ArticlesController extends CoreController
{

            /**
     * Méthode s'occupant de l'affichage 
     *
     * @return void
     */
    public function articleDetail($articleSlug)
    {
        $urlAPI = "http://127.0.0.1:8000/api/articles/{$articleSlug}";
        $ch = curl_init($urlAPI);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);
        $response = curl_exec($ch);
        curl_close($ch);
        $response = trim($response);

        // Décodage de la réponse JSON
        $result = json_decode($response, true);      
        $this->show('articles/articles', ['articleId'=>$result['id'], 'articleTitle'=>$result['title'],'articleSubtitle'=>$result['subtitle'], 'articleContent'=>$result['content'], 'articlePicture'=>$result['picture']]);
    }

    /**
     * Méthode s'occupant de l'affichage 
     *
     * @return void
     */
    public function articleDetailUpdate($articleId)
    {
        $actionMsg = "";
        $title = filter_input(INPUT_POST, 'article--title', FILTER_SANITIZE_SPECIAL_CHARS);
        $subtitle = filter_input(INPUT_POST, 'article--subtitle', FILTER_SANITIZE_SPECIAL_CHARS);
        $content = filter_input(INPUT_POST, 'article--text', FILTER_SANITIZE_SPECIAL_CHARS);
        $datas = [
            'title' => $title,
            'subtitle' => $subtitle,
            'content' => $content
        ];
        // Vérifier si le fichier image a été soumis
        if (isset($_FILES['article--picture']) && $_FILES['article--picture']['error'] === UPLOAD_ERR_OK) {
            // Informations sur le fichier
            $fileTmpPath = $_FILES['article--picture']['tmp_name'];  // Chemin temporaire du fichier
            $fileName = $_FILES['article--picture']['name'];         // Nom original du fichier
            $fileSize = $_FILES['article--picture']['size'];         // Taille du fichier
            $fileType = $_FILES['article--picture']['type'];         // Type MIME
            $fileError = $_FILES['article--picture']['error'];       // Code d'erreur
            // Définir le dossier de destination
            $uploadDir = __DIR__ . '/../../public/images/';
            // Créer un chemin complet de destination
            $destinationPath = $uploadDir . basename($fileName);
            // Déplacer le fichier de son emplacement temporaire vers la destination
            if (move_uploaded_file($fileTmpPath, $destinationPath)) {
                $datas['picture'] = $fileName; 
                $actionMsg = "Fichier téléchargé avec succès ! ";
            } else {
                $actionMsg = "Une erreur est survenue lors du téléchargement du fichier.";
            }
        }
       
        $urlAPI = "http://127.0.0.1:8000/api/articles/$articleId";
        $json_data = json_encode($datas);

        $ch = curl_init($urlAPI);
        // On configure la requête cURL pour envoyer un
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
        $this->show('articles/articles', ['actionMsg'=>$actionMsg, 'articleTitle'=>$result['title'],'articleSubtitle'=>$result['subtitle'], 'articleContent'=>$result['content'], 'articlePicture'=>$result['picture']]);
    }

        /**
     * Méthode s'occupant de l'affichage 
     *
     * @return void
     */
    public function articleAdd()
    {
        $this->show('articles/articles', ['articleTitle'=>'', 'articleSubtitle'=>'', 'articleContent'=>'', 'articlePicture'=>'']);
    }

            /**
     * Méthode s'occupant de la soumission du formulaire d'ajout d'un nouvel article 
     *
     * @return void
     */
    public function articleAddPost()
    {
        $title = filter_input(INPUT_POST, 'article--title', FILTER_SANITIZE_SPECIAL_CHARS);
        $subtitle = filter_input(INPUT_POST, 'article--subtitle', FILTER_SANITIZE_SPECIAL_CHARS);
        $content = filter_input(INPUT_POST, 'article--text', FILTER_SANITIZE_SPECIAL_CHARS);
        $slug = $this->convertToSlug($title);
        $datas = [
            'title' => $title,
            'subtitle' => $subtitle,
            'content' => $content,
            'slug' => $slug
        ];
        // Vérifier si le fichier image a été soumis
        if (isset($_FILES['article--picture']) && $_FILES['article--picture']['error'] === UPLOAD_ERR_OK) {
            // Informations sur le fichier
            $fileTmpPath = $_FILES['article--picture']['tmp_name'];  // Chemin temporaire du fichier
            $fileName = $_FILES['article--picture']['name'];         // Nom original du fichier
            $fileSize = $_FILES['article--picture']['size'];         // Taille du fichier
            $fileType = $_FILES['article--picture']['type'];         // Type MIME
            $fileError = $_FILES['article--picture']['error'];       // Code d'erreur
            // Définir le dossier de destination
            $uploadDir = __DIR__ . '/../../public/images/';
            // Créer un chemin complet de destination
            $destinationPath = $uploadDir . basename($fileName);
            // Déplacer le fichier de son emplacement temporaire vers la destination
            if (move_uploaded_file($fileTmpPath, $destinationPath)) {
                $datas['picture'] = $fileName; 
                $actionMsg = "Fichier téléchargé avec succès ! ";
            } else {
                $actionMsg = "Une erreur est survenue lors du téléchargement du fichier.";
            }
        }
       
        $urlAPI = "http://127.0.0.1:8000/api/articles";
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
        var_dump($response);
        var_dump($result);    
        $this->show('articles/articles', ['actionMsg'=>$actionMsg, 'articleTitle'=>$result['title'],'articleSubtitle'=>$result['subtitle'], 'articleContent'=>$result['content'], 'articlePicture'=>$result['picture']]);
    }

    public function convertToSlug($string) {
        // Remplacer les apostrophes par rien
        $string = str_replace("'", "", $string);
        // Remplacer les espaces par des tirets
        $string = str_replace(" ", "-", $string);
        $string = strtolower($string);
        // Retourner la chaîne modifiée
        return $string;
    }

                /**
     * Méthode s'occupant de la suppression d'un article 
     *
     * @return void
     */
    public function articleDelete($articleId)
    {
        $actionMsg = "";
        $urlAPI = "http://127.0.0.1:8000/api/articles/{$articleId}";
        $ch = curl_init($urlAPI);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);
        $response = curl_exec($ch);
        curl_close($ch);
        $response = trim($response);
        $actionMsg="L'article a bien été supprimé";
        $this->show('main/home', ['actionMsg'=>$actionMsg]);
    }
}
