<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePollRequest;
use Illuminate\Http\Request;
use App\Models\Poll;
use App\Models\Option;

class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dernierSondage = Poll::orderByDesc('id')->first();

        // Vérifier si le sondage est en cours
        if (($dernierSondage->start_date->addMinutes($dernierSondage->duration)->toDateTimeString()) > now()) {
            // Si le sondage est en cours, retourner une vue pour l'édition du sondage en cours
            return view('poll.edit', compact('dernierSondage'));
        } else {
            // Si le sondage n'est pas en cours, retourner une vue pour l'édition d'un nouveau sondage
            return view('poll.create', compact('dernierSondage'));
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
        Poll::create([
            'title' => $request->title,
            'description' => $request->description,
            'duration' => $request->duration,
        ]);

        foreach ($request->options as $option) {
            Option::create([
                'poll_id' => $poll->id,
                'name' => $option,
            ]);
        }

        dd($request->options);
        return back();
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
