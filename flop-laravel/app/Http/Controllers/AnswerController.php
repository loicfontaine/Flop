<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pollAnswer');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Récupère le dernier id de la table survey pour l'insérer dans la table answer pour survey_id
        $dernierSondage = DB::table('polls')->orderBy('id', 'desc')->first();
        $sondageId = $dernierSondage->id;

        $reponses = DB::table('options')->where('poll_id', $sondageId)->get();

        $reponseTab = [];

        foreach ($reponses as $reponse) {
            $reponseTab[] = $reponse;
        }

        $delai = $dernierSondage->duration;

        /*
        BONUS - Vérification du délai du sondage pour ne pas l'afficher
        si jamais il est dépassé par rapport à l'heure actuelle
        au moment du chargement de la page et que l'utilisateur
        a désactivé JavaScript.
        */

        // Convertir la date actuelle en timestamp
        $nowTimestamp = now()->timestamp;

        // Convertir le délai en timestamp
        $delaiTimestamp = strtotime($delai);

        // Vérifier si la date actuelle est supérieure au délai
        if ($nowTimestamp > $delaiTimestamp) {
            $delai = 0;
        }

        // Si l'utilisateur a déjà répondu au dernier sondage, la variable délai sera a 0
        // et le sondage ne s'affichera plus
        $user = Auth::user();
        $userAnswers = $user->answers()->where('poll_id', $sondageId)->get();
        if ($userAnswers->count() > 0) {
            $delai = 0;
        }

        return view('pollAnswer')->with('question', $dernierSondage->title)->with('duree', $delai)
            ->with('reponses', $reponseTab);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*
         * Récupérer les données du formulaire 
         * Enregistrer dans la table answers
         * Enregistrer dans la table answer_user
         * Enregistrer dans la table survey
         * */

        $user = Auth::user();

        $answers = $request->input('option_user');

        $dernierSondage = DB::table('polls')->orderBy('id', 'desc')->first();

        // intvval sert à convertir en int
        foreach ($answers as $answerId) {
            $user->answers()->attach(intval($answerId), [
                'user_id' => Auth::id(),
                'option_id' => $dernierSondage->id,
            ]);
        }
        return "Votre vote a bien été pris en compte";
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
