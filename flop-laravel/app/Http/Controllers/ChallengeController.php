<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Challenge;
// use carbon
use App\Models\Reward;
use App\Models\Article;
use App\Models\Participation_type;
use App\Models\Participation;

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
            $contest = true;
        } else {
            $contest = false;
        }

        $challenge = Challenge::create([
            'name' => $request->input('title'),
            'description' => $request->input('description'),
            'end_time' => $request->input('end_time'),
            'ColorCoins_earned_by_participation' => $request->input('colorCoins'),
            'is_contest' => $contest,
        ]);
        if ($request->input("type-audio") == "on") {
            $challenge->participation_types()->attach(1);
        }

        if ($request->input("type-photo") == "on") {
            $challenge->participation_types()->attach(2);
        }
        if ($request->input("type-video") == "on") {
            $challenge->participation_types()->attach(3);
        }
        if ($request->input("type-text") == "on") {
            $challenge->participation_types()->attach(4);
        }

        if ($contest) {
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
        }




        return redirect()->route("admin.dashboard");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $challenge = Challenge::findOrFail($id);
        $participations = $challenge->participations;
        return view('partials.challengeDetails', compact('challenge', 'participations'));
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
