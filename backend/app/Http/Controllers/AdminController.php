<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        // Récupération de la liste des admin et de leur contenu
        return Admin::all();
    }

    /**
     * Display the specified resource.
     */
    public function findByEmail(Request $request)
    {
    // Récupération des données du formulaire
    $email = $request->input('email');
    $password = $request->input('password');

    // On cherche l'utilisateur avec cet email
    $admin = Admin::where('email', $email)->first();
    if ($admin && Hash::check($password, $admin->password)) {
        // Authentification réussie, on peut générer un token ou une session si nécessaire
        return response()->json(['success' => true, 'message' => 'Login successful', 'data' => $admin->firstname]);
    } else {
        // Échec de la connexion
        return response()->json(['success' => false, 'message' => 'Invalid credentials'], 401);
    }
    }

}
