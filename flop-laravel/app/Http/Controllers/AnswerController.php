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
            // option_user getter
            $userId = Auth::user()->id;
            $user = User::find($userId);
            $optionUser = DB::table('option_user')->where('user_id', Auth::user()->id)->get();
            $answers = $request->input('options');

            $matchingOptions = [];

            foreach ($optionUser as $optionUserItem) {
                foreach ($answers as $answerItem) {
                    if ($optionUserItem->option_id === $answerItem) {
                        $matchingOptions[] = $optionUserItem->option_id;
                    }
                }
            }

            if (count($matchingOptions) > 0) {
                // Obtenir l'option correspondante dans la table 'options' en utilisant l'id de 'option_user'
                $matchingOption = Option::find($matchingOptions[0]);
            
                if ($matchingOption) {
                    return "Vous avez déjà voté pour l'option : " . $matchingOption->title;
                } else {
                    return "L'option correspondante n'a pas été trouvée.";
                }
            } else {
                foreach ($answers as $answer) {
                    if ($answer != null) {
                        $option = Option::find($answer);
            
                        if ($option) {
                            // Vérifier si l'option est déjà attachée à l'utilisateur
                            if ($user->options()->where('id', $option->id)->exists()) {
                                // L'option est déjà attachée à l'utilisateur, renvoyer un message
                                return "L'option '" . $option->title . "' est déjà sélectionnée.";
                            }
            
                            // Attacher l'option à l'utilisateur
                            $user->options()->attach($option);
                        }
                    }
                }
            
                // Récupérer les options attachées à l'utilisateur
                $userOptions = $user->options;
            
                return "Votre vote a bien été pris en compte.";
            }
        }else{
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
