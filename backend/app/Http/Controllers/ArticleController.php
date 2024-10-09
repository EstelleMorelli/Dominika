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
        return Article::with('localisations')->get();

    }

    /**
     * Display the specified resource.
     */
    public function find(int $id)
    {
        //Récupération de l'article en fonction de l'id
        return Article::with('localisations')->findOrFail($id);
    }

        /**
     * Display the specified resource.
     */
    public function findBySlug(string $slug)
    {
        //Récupération de l'article en fonction de l'id
        return Article::with('localisations')->where('slug', $slug)->first();
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        // Extraction et sécurisation des valeurs passées dans le body de la requête
        $title = htmlspecialchars($request->input('title'), ENT_QUOTES, 'UTF-8');
        $subtitle = htmlspecialchars($request->input('subtitle'), ENT_QUOTES, 'UTF-8');
        $content = htmlspecialchars($request->input('content'), ENT_QUOTES, 'UTF-8');
        $picture = $request->input('picture'); 
        $slug = htmlspecialchars($request->input('slug'), ENT_QUOTES, 'UTF-8');

        // Création d'une nouvelle instance Article
        $article = new Article();
        // Sauvegarde
        $article->title = $title;
        $article->subtitle = $subtitle;
        $article->content = $content;
        $article->picture = $picture;
        $article->slug = $slug;
        // Gestion de la réponse HTTP
        if ($article->save()){
            // Vérification des localisations et ajout à la table pivot après sauvegarde de l'article
            if ($request->has('localisations')) {
                $localisations = $request->input('localisations');  // Récupération des localisations
                if (is_array($localisations) && count($localisations) > 0) {
                    // Attacher les localisations
                    $article->localisations()->attach($localisations);
                }
            }
            return response()->json($article, Response::HTTP_CREATED);
        } 
        return response(null, Response::HTTP_INTERNAL_SERVER_ERROR);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        // Recherche de l'article en fonction de l'id
        $article= Article::findOrFail($id);
         // Mise à jour conditionnelle des champs avec sécurisation
        if ($request->has('title')) {
        $article->title = htmlspecialchars($request->input('title'), ENT_QUOTES, 'UTF-8');  // Protection contre les XSS
        }
        if ($request->has('subtitle')) {
        $article->subtitle = htmlspecialchars($request->input('subtitle'), ENT_QUOTES, 'UTF-8');  // Protection contre les XSS
        }
        if ($request->has('slug')) {
            $article->slug = htmlspecialchars($request->input('slug'), ENT_QUOTES, 'UTF-8');  // Protection contre les XSS
            }
        if ($request->has('content')) {
        $article->content = htmlspecialchars($request->input('content'), ENT_QUOTES, 'UTF-8');  // Protection contre les XSS
        }
        if ($request->has('picture')) {
        // Validation URL déjà effectuée, pas besoin de nettoyage supplémentaire si l'URL est correcte
        $article->picture = $request->input('picture');
        }
        // Mise à jour des localisations (relation Many-to-Many)
        if ($request->has('localisations')) {
        $localisations = $request->input('localisations');  // Récupération des localisations depuis la requête
        // Utilisation de la méthode sync() pour mettre à jour les localisations associées à l'article
        $article->localisations()->sync($localisations);
        }

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
