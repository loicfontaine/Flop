<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
        $this->middleware('admin', ['only' => 'destroy']);
    }


    public function dashboard()
    {
        //si authentifier et admin return dashboard
        if ($this->middleware('admin')) {
            $articles = Article::all();
            return view("admin_dashboard", compact("articles"));
        } else {
            return view("/");
        }

        //get all articles

    }
}
