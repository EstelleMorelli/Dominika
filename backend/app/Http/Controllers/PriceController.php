<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        // Récupération de la liste des prix
        return Price::all();
    }

    /**
     * Display the specified resource.
     */
    public function find(int $id)
    {
        // Récupération du prix en fonction de l'id
        return Price::findOrFail($id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        // Extraction des valeurs passées dans le body de la requête
        $title = $request->input('title');
        $duration = $request->input('duration');
        $amount = $request->input('amount');
        $currency = $request->input('currency');
        // TODO : VERIFIER LES VALEURS

        // Création d'une nouvelle instance Price
        $price = new Price();
        // Sauvegarde
        $price->title = $title;
        $price->duration = $duration;
        $price->amount = $amount;
        $price->currency = $currency;
        // Gestion de la réponse HTTP
        if ($price->save()){
            return response()->json($price, Response::HTTP_CREATED);
        } else {
            return response(null, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        // Extraction des valeurs passées dans le body de la requête
        $title = $request->input('title');
        $duration = $request->input('duration');
        $amount = $request->input('amount');
        $currency = $request->input('currency');
        // TODO : VERIFIER LES VALEURS

        // Recherche du prix en fonction de l'id
        $price= Price::findOrFail($id);
        // Sauvegarde
        $price->title = $title;
        $price->duration = $duration;
        $price->amount = $amount;
        $price->currency = $currency;
        // Gestion de la réponse HTTP
        if ($price->save()){
            return response()->json($price);
        }
        return response(null, Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //Récupération du prix en fonction de l'id
        $price= Price::findOrFail($id);
        // Suppression et gestion de la réponse HTTP
        if ($price->delete()){
            return response(null, Response::HTTP_NO_CONTENT);
        }
        return response(null, Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
