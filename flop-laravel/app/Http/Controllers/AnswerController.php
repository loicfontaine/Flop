<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Option;
use Carbon\Carbon;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return redirect()->route('answer.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dernierSondage = DB::table('polls')->orderBy('id', 'desc')->first();
        $reponses = DB::table('options')->where('poll_id', $dernierSondage->id)->get();
        $timeLeft = Carbon::now()->diffInMinutes(Carbon::parse($dernierSondage->start_date)->addMinutes($dernierSondage->duration));

        return view('pollAnswer')->with(compact('dernierSondage', 'reponses', 'timeLeft'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $user = User::find($userId);
            $answers = $request->input('options');

            for ($i = 0; $i < count($answers); $i++) {
                $user->options()->attach($answers[$i]);
            }

            $user->options;

            return "Votre vote a bien été pris en compte";
        } else {
            return "Vous devez être connecté pour voter";
        }
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
