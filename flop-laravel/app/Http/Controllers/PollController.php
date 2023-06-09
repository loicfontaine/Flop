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
        return redirect()->route('poll.create');
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

        $options = $request->input('options');
        $result = DB::table('polls')->orderBy('id', 'desc')->first();
        $lastId = $result->id;

        for ($i = 0; $i < count($options); $i++) {
            Option::create([
                'title' => $options[$i],
                'poll_id' => $lastId,
            ]);
        }

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dernierSondage = DB::table('polls')->orderBy('id', 'desc')->first();
        $reponses = DB::table('options')->where('poll_id', $dernierSondage->id)->get();
        $title = $dernierSondage->title;
        $description = $dernierSondage->description;
        $duration =  $dernierSondage->duration;

        return view('pollList')->with(compact('dernierSondage', 'reponses', 'title', 'description', 'duration', 'polls'));
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
}
