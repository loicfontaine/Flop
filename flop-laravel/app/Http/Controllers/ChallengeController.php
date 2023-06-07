<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Challenge;

use App\Http\Requests\ChallengeRequest;
use App\Models\Reward;
use App\Models\Article;

class ChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $challenges = Challenge::where("end_time", ">", date("Y-m-d H:i:s"))->get();
        $types = $challenges->participation_types;


        return view("emission", compact("challenges, types"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //return view('creation_challenge');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        /*
        "title" => "dsa"
        "description" => "sd"
        "type-photo" => "on"
        "type-video" => "on"
        "type-audio" => "on"
        "end_time" => "2023-06-05T14:58"
        "quantity-4" => "1" 

        */

        //if $request contains a string begining with "quantity-"
        if (preg_grep("/^quantity-/", array_keys($request->all()))) {
            dd("ok");
        } else {
            dd("pas ok");
        }


        $challenge = Challenge::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'end_time' => $request->input('end_time'),
            'colorCoins' => $request->input('ColorCoins_earned_by_participation'),
            'is_contest' => $request->input('is_contest'),
        ]);
        if ($request->input("type-audio") == "on") {
            $challenge->types()->attach(1);
        }

        if ($request->input("type-photo") == "on") {
            $challenge->types()->attach(2);
        }
        if ($request->input("type-video") == "on") {
            $challenge->types()->attach(3);
        }
        if ($request->input("type-text") == "on") {
            $challenge->types()->attach(4);
        }



        //foreach reward
        Article::all()->each(function ($article) use ($request, $challenge) {
            if ($request->input("quantity-" . $article->id)) {
                Reward::create(
                    [
                        "quantity" => $request->input("quantity-" . $article->id),
                        "article_id" => $article->id,
                        "challenge_id" => $challenge->id,
                    ]
                );
            }
        });

        //foreach types
        //challenge->attach($request->input("participation_types"));



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
        Challenge::findOrFail($id)->delete();
        return redirect()->back();
    }



    public function endContest(Request $request)
    {
        $challenge = Challenge::findOrFail($request->input("challenge_id"));
        $winner = $request->input("winner");
        $challenge->reward->user_id = $winner;
        $challenge->reward->save();
        $challenge->start_time = $challenge->end_time;
        $challenge->save();
    }
}
