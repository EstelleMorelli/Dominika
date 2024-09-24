<?php

namespace App\Controllers;

class ArticlesController extends CoreController
{
        /**
     * Méthode s'occupant de l'affichage 
     *
     * @return void
     */
    public function coaching()
    {
        $this->show('articles/coaching');
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