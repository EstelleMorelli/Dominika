<?php

namespace App\Controllers;

class CoachingController extends CoreController
{
    /**
     * Méthode s'occupant de l'affichage du formulaire de connexion d'un utilisateur
     *
     * @return void
     */
    public function coachingDefinition()
    {
        $this->show('coaching/definition');
    }

    /**
     * Méthode s'occupant de l'affichage du formulaire de connexion d'un utilisateur
     *
     * @return void
     */
    public function coachingSession()
    {
        $this->show('coaching/session');
    }

     /**
     * Méthode s'occupant de l'affichage du formulaire de connexion d'un utilisateur
     *
     * @return void
     */
    public function coachingNeeded()
    {
        $this->show('coaching/needed');
    }
}