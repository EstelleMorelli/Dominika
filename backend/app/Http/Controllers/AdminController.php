<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

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
    public function findByEmail(string $email)
    {
        // Récupération de l'utilisateur en fonction de l'id;
        return Admin::where('email', $email)->firstOrFail();
    }

}
