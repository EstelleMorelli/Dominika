<?php

namespace App\Controllers;

class MainController extends CoreController
{
    /**
     * Méthode s'occupant de l'affichage du formulaire de connexion d'un utilisateur
     *
     * @return void
     */
    public function mainHome()
    {
        $this->show('main/home');
    }

       /**
     * Méthode s'occupant de l'affichage du formulaire de connexion d'un utilisateur
     *
     * @return void
     */
    public function mainAbout()
    {
        $this->show('main/about');
    }


    /**
     * Méthode s'occupant de l'affichage du formulaire de connexion d'un utilisateur
     *
     * @return void
     */
    public function contact()
    {
        $this->show('main/form');
    }

   /**
     * Méthode s'occupant de l'affichage du formulaire de connexion d'un utilisateur
     *
     * @return void
     */
    public function contactPost()
    {
        $this->show('main/form');
    }

}