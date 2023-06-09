<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePollRequest;
use Illuminate\Http\Request;
use App\Models\Poll;
use App\Models\Option;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            'title' => 'Quelle musique voulez-vous écouter ?',
            'description' => '',
            'duration' => '5',
            'user_id' => Auth::user()->id,
            'start_date' => now(),
        ]);

        $result = DB::table('polls')->orderBy('id', 'desc')->first();
        $options = array();
        //get 20 songs by most played
        $mostPlayed = DB::table('songs')->orderBy('id', 'asc')->limit(20)->get();
        // pushes two random mostPlayed
        for ($i = 0; $i < 2; $i++) {
            $randomized = $mostPlayed[rand(0, 19)];
            // checks if the song is already in the array
            while (in_array($randomized, $options)) {
                $randomized = $mostPlayed[rand(0, 19)];
            }
            array_push($options, $randomized);
        }
        //get 20 songs by least played
        $leastPlayed = DB::table('songs')->orderBy('id', 'desc')->limit(20)->get();
        // pushes two random leastPlayed songs
        for ($i = 0; $i < 2; $i++) {
            $randomized = $leastPlayed[rand(0, 19)];
            // checks if the song is already in the array
            while (in_array($randomized, $options)) {
                $randomized = $leastPlayed[rand(0, 19)];
            }
            array_push($options, $randomized);
        }

        for ($i = 0; $i < count($options); $i++) {
            Option::create([
                'title' => $options[$i]->artist . ' - ' . $options[$i]->name,
                'poll_id' => $result->id,
                'song_id' => $options[$i]->id,
            ]);
        }

        return 'Le sondage a bien été créé !';
    }
}
