<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePollRequest;
use Illuminate\Http\Request;
use App\Models\Poll;
use App\Models\Option;
use Carbon\Carbon;

class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dernierSondage = Poll::orderByDesc('id')->first();
        $start_date = $start_date = Carbon::parse($dernierSondage->start_date);
        $duration = $dernierSondage->duration * 60000;
        $pollId = $dernierSondage->id;
        // Vérifier si le sondage est en cours
        if ($start_date->addMinutes($duration)->toDateTime() > now()) {
            // Si le sondage est en cours, retourner une vue pour l'édition du sondage en cours
            //return redirect()->route('poll.edit', ['poll' => $pollId], compact('dernierSondage'));
        } else {
            // Si le sondage n'est pas en cours, retourner une vue pour l'édition d'un nouveau sondage
            return redirect()->route('poll.create');
        }
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
        $poll = new Poll;
        $poll->titre = $request->input('titre');
        $poll->description = $request->input('description');
        $poll->duration = $request->input('duration');
        $poll->start_date = $request->input('start_date');

        // Enregistrez le sondage dans la base de données
        $poll->save();

        // Insérez les options du sondage
        $options = $request->input('options');

        foreach ($options as $option) {
            // Création de chaque option
            $option = new Option;
            $option->poll_id = $poll->id; // Utilisation de l'ID du sondage
            $option->title = $option;
            $option->save();
        }

        return redirect()->route('poll.create');
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
        $dernierSondage = Poll::latest()->first();

        // Passer le sondage à la vue pour l'affichage dans le formulaire d'édition
        return view('pollEdit', compact('dernierSondage'));
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
