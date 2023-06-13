<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Challenge;
use App\Models\Participation;
use App\Models\Content;
use App\Models\Participation_type;
use App\Models\Poll;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
        $this->middleware('admin', ['only' => 'destroy']);
    }


    public function dashboard()
    {
        $articles = Article::all();

            // LIST OF CHALLENGES
            // get current datetime
            $now = date("Y-m-d H:i:s");
            // get challenges that end_time is greater than $now
            $challenges = Challenge::where("end_time", ">", $now)->where('is_contest', '=', 0)->get();
            // get all data from participation table
            $participations = Participation::all();
            // get contents from table contents
            $contents = Content::all();
            // get all polls
            $polls = Poll::all();

         return view("admin_dashboard", compact("articles", "challenges", "polls", "participations", "contents"));
    }
}