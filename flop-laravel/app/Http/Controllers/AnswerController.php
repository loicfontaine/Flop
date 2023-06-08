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
        // Récupère le dernier id de la table survey pour l'insérer dans la table answer pour survey_id
        $dernierSondage = DB::table('polls')->orderBy('id', 'desc')->first();
        $reponses = DB::table('options')->where('poll_id', $dernierSondage->id)->get();
        $options = [];
        $title = $dernierSondage->title;
        $description = $dernierSondage->description;
        $duration =  $dernierSondage->duration;

        foreach ($reponses as $reponse) {
            $options[] = $reponse;
        }

        return view('pollAnswer')->with(compact('dernierSondage', 'title', 'duration', 'options', 'description'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $user = User::find($userId);
            $answers = $request->input('option_user');

            for ($i = 0; $i < count($answers); $i++) {
                if ($request->input('option_user')[$i] == "on") {
                    $user->options()->attach($i);
                }
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
