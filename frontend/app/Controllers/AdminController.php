<?php

namespace App\Controllers;

class AdminController extends CoreController
{
    /**
     * Méthode s'occupant de l'affichage du formulaire de connexion d'un utilisateur administrateur
     *
     * @return void
     */
    public function login()
    {
        $this->show('main/login');
    }

        /**
     * Méthode s'occupant de la déconnection de l' utilisateur administrateur
     *
     * @return void
     */
    public function logout()
    {
        // Détruire la session pour déconnecter l'utilisateur
        session_unset(); // Effacer toutes les variables de session
        session_destroy(); // Détruire la session

        // Rediriger vers la page de login (ou autre page)
        header("Location: " . $this->router->generate('admin-login-page'));
        exit;
    }

    public function loginPost()
    {
        require __DIR__ . '/../../public/api.php';
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
    
        $datas = [
            'email' => $email,
            'password' => $password
        ];
    
        $urlAPI = "{$api_url}/admins/{$email}";
        $json_data = json_encode($datas);
    
        $ch = curl_init($urlAPI);
    
        // On configure la requête cURL pour envoyer un POST
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
    
        $response = curl_exec($ch);
        curl_close($ch);
        $response = trim($response);
        // Décodage de la réponse JSON
        $result = json_decode($response, true);
        if ($result === null) {
            echo "Erreur lors du décodage de la réponse JSON : " . json_last_error_msg();
            return; // Quitter la fonction en cas d'erreur
        }
    
        // Si le succès est vrai, rediriger
        if ($result['success']) {
            $_SESSION['firstname']=$result['data'];
            // Redirection 
            header('Location: /accueil');
            // exit; // Assurez-vous de quitter le script après la redirection
        } else {
            // Échec de la connexion, afficher un message
            echo "Erreur de connexion : " . $result['message'];
        }
    }
}