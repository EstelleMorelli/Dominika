<?php

namespace App\Controllers;

class ErrorController extends CoreController
{
    /**
     * Méthode s'occupant de l'affichage du formulaire de connexion d'un utilisateur
     *
     * @return void
     */
    public function err404()
    {
        $this->show('main/error');
    }
}