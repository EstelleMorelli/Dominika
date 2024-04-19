<?php

namespace App\Controllers;

class PosturologieController extends CoreController
{
    /**
     * Méthode s'occupant de l'affichage du formulaire de connexion d'un utilisateur
     *
     * @return void
     */
    public function posturologieDefinition()
    {
        $this->show('posturologie/definition');
    }

    /**
     * Méthode s'occupant de l'affichage du formulaire de connexion d'un utilisateur
     *
     * @return void
     */
    public function posturologieSession()
    {
        $this->show('posturologie/session');
    }

     /**
     * Méthode s'occupant de l'affichage du formulaire de connexion d'un utilisateur
     *
     * @return void
     */
    public function posturologieNeeded()
    {
        $this->show('posturologie/needed');
    }
}