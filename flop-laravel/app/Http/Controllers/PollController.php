<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePollRequest;
use Illuminate\Http\Request;
use App\Models\Poll;
use App\Models\Option;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Bool_;

class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all polls
        $polls = DB::table('polls')->get();

        return view('pollList')->with(compact('polls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pollCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePollRequest $request)
    {
        Poll::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'duration' => $request->input('duration'),
            'user_id' => Auth::user()->id,
            'start_date' => $request->input('start_date'),
        ]);

        $result = DB::table('polls')->orderBy('id', 'desc')->first();
        $options = $request->input('options');

        for ($i = 0; $i < count($options); $i++) {
            Option::create([
                'title' => $options[$i],
                'poll_id' => $result->id,
            ]);
        }

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sondage = DB::table('polls')->where('id', $id)->get();
        $reponses = DB::table('options')->where('poll_id', $id)->get();

        return view('pollShow')->with(compact('sondage', 'reponses'));
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
        // Remove the last poll in db
        $poll = DB::table('polls')->orderBy('id', 'desc')->first();
        $pollId = $poll->id;
        DB::table('polls')->where('id', $pollId)->delete();
    }

    /**
     * Crée un poll de musique automatique
     */
    public function createMusic()
    {
        Poll::create([
            'title' => 'Prochaine musique',
            'description' => 'Choisissez la prochaine musique grâce à ce sondage automatique :D',
            'duration' => '5',
            'user_id' => Auth::user()->id,
            'start_date' => now(),
        ]);

        $result = DB::table('polls')->orderBy('id', 'desc')->first();
        $songs = [];
        $options = array();
        //songs by most played
        $mostPlayed = DB::table('songs')->orderBy('id', 'asc')->limit(10)->random(2);
        array_push($songs, $mostPlayed);
        //songs by least played
        $leastPlayed = DB::table('songs')->orderBy('id', 'desc')->limit(10)->random(2);
        array_push($songs, $leastPlayed);

        for ($i = 0; $i < count($options); $i++) {
            Option::create([
                'title' => $options[$i]->title,
                'poll_id' => $result->id,
                'song_id' => $options[$i]->id,
            ]);
        }

        return dd($options);
    }
}
