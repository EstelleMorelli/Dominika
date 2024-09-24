<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        // Récupération de la liste des articles et de leur contenu
        return Article::all();
    }

    /**
     * Display the specified resource.
     */
    public function find(int $id)
    {
        //Récupération de l'article en fonction de l'id
        return Article::findOrFail($id);
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        // Extraction des valeurs passées dans le body de la requête
        $title = $request->input('title');
        $subtitle = $request->input('subtitle');
        $content = $request->input('content');
        $picture = $request->input('picture');
        // TODO : VERIFIER LES VALEURS

        // Création d'une nouvelle instance Article
        $article = new Article();
        // Sauvegarde
        $article->title = $title;
        $article->subtitle = $subtitle;
        $article->content = $content;
        $article->picture = $picture;
        // Gestion de la réponse HTTP
        if ($article->save()){
            return response()->json($article, Response::HTTP_CREATED);
        } 
        return response(null, Response::HTTP_INTERNAL_SERVER_ERROR);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        // Extraction des valeurs passées dans le body de la requête
        $title = $request->input('title');
        $subtitle = $request->input('subtitle');
        $content = $request->input('content');
        $picture = $request->input('picture');
        // TODO : VERIFIER LES VALEURS

        // Recherche de l'article en fonction de l'id
        $article= Article::findOrFail($id);
        // Sauvegarde 
        $article->title = $title;
        $article->subtitle = $subtitle;
        $article->content = $content;
        $article->picture = $picture;
        // Gestion de la réponse HTTP
        if ($article->save()){
            return response()->json($article);
        }
        return response(null, Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(int $id)
    {
        //Récupération de l'article en fonction de l'id
        $article= Article::findOrFail($id);
        // Suppression et gestion de la réponse HTTP
        if ($article->delete()){
            return response(null, Response::HTTP_NO_CONTENT);
        }
        return response(null, Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
