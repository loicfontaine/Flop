<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class adminController extends Controller
{



    public function dashboard()
    {

        //get all articles
        $articles = Article::all();
        return view("admin_dashboard", compact("articles"));
    }
}
