<?php

namespace App\Controllers;

class ArticlesController extends CoreController
{

            /**
     * Méthode s'occupant de l'affichage 
     *
     * @return void
     */
    public function articleDetail($articleId)
    {
        $urlAPI = "http://127.0.0.1:8000/api/articles/{$articleId}";
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
        $this->show('articles/coaching', ['articleTitle'=>$result['subtitle'], 'articleContent'=>$result['content'], 'articlePicture'=>$result['picture']]);
    }
        /**
     * Méthode s'occupant de l'affichage 
     *
     * @return void
     */
    public function coaching()
    {
        $urlAPI = "http://127.0.0.1:8000/api/articles/7";
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
        $this->show('articles/coaching', ['articleTitle'=>$result['subtitle'], 'articleContent'=>$result['content'], 'articlePicture'=>$result['picture']]);
    }
        /**
     * Méthode s'occupant de l'affichage 
     *
     * @return void
     */
    public function difficultesScolaires()
    {
        $this->show('articles/difficultes-scolaires');
    }

    /**
     * Méthode s'occupant de l'affichage
     * @return void
     */
    public function douleursPersistantes()
    {
        $this->show('articles/douleurs-persistantes');
    }

    /**
     * Méthode s'occupant de l'affichage 
     *
     * @return void
     */
    public function hernieDiscale()
    {
        $this->show('articles/hernies-discales');
    }

     /**
     * Méthode s'occupant de l'affichage 
     *
     * @return void
     */
    public function mauxTete()
    {
        $this->show('articles/maux-de-tete');
    }
         /**
     * Méthode s'occupant de l'affichage 
     *
     * @return void
     */
    public function performance()
    {
        $this->show('articles/performance');
    }
         /**
     * Méthode s'occupant de l'affichage 
     *
     * @return void
     */
    public function posturologie()
    {
        $this->show('articles/posturologie');
    }
}