<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Challenge;

use App\Http\Requests\ChallengeRequest;
use App\Models\Reward;


class ChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $challenges = Challenge::where("end_time", ">", date("Y-m-d H:i:s"))->get();
        return view("emission", compact("challenges"));
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

    public function store(ChallengeRequest $request)
    {
        Challenge::create([

            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            'ColorCoins' => $request->input('ColorCoins_earned_by_participation'),
            'is_contest' => $request->input('is_contest'),
        ]);
        //foreach reward
        if ($request->input("is_contest") == "1" && $request->input("rewards")) {

            $rewards = explode("&", $request->input("rewards"));
            foreach ($rewards as $reward) {
                $reward = explode("=", $reward);
                Reward::create(
                    [
                        "quantity" => $reward[0],
                        "article_id" => $reward[1],
                        "user_id" => $request->input("user_id"),
                        "challenge_id" => $request->input("challenge_id"),
                    ]
                );
            }
            //foreach types
            //challenge->attach($request->input("participation_types"));
        }


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


    public function endChallenge(string $id)
    {
        //$participations = participation.show($id)
        //$winner = rand(1, participation.count()));
        //rewards->participation_id = $participation[$winner]->id 
        //return view("endChallenge", compact("winner"));
    }
}
