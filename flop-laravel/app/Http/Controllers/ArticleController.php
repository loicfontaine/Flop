<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        //return all articles
        $articles = Article::all();

        return view("boutique_accueil", compact("articles"));
    }





    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        Article::create([
            "name" => $request->input("name"),
            "description" => $request->input("description"),
            "image" => $request->input("image"),
            "price" => $request->input("price"),
            "nb_stock" => $request->input("nb_stock"),
            "is_displayed" => $request->input("is_displayed"),
        ]);

        return view("test");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
