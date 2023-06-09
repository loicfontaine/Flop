<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Option;
use Carbon\Carbon;
use App\Models\Polls;

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
            // Poll le plus récent
            $lastPoll = DB::table('polls')->orderBy('id', 'desc')->first();
            // Retournes les options possibles pour le poll le plus récent
            $pollOptions = DB::table('options')->where('poll_id', $lastPoll->id)->get();
            // Retourne le tableau option_user qui contient l'ID de l'utilisateur concerné uniquement
            $existingVotes = DB::table('option_user')->where('user_id', $userId);

            // Si l'utilisateur a déjà voté pour une des options de ce sondage

            if ($existingVotes->count() > 0) {
                // On récupère les ID des options pour lesquelles l'utilisateur a déjà voté
                $existingVotes = $existingVotes->pluck('option_id');
                // On récupère les ID des options pour le sondage en cours
                $pollOptions = $pollOptions->pluck('id');
                // On compare les deux tableaux
                $result = $existingVotes->intersect($pollOptions);
                // Si le tableau résultant n'est pas vide, l'utilisateur a déjà voté pour une des options de ce sondage
                if (!$result->isEmpty()) {
                    return "Vous avez déjà voté pour ce sondage";
                }

            } else {
                $user->options()->attach($answers);
            }
            return "Votre vote a bien été pris en compte.";
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
