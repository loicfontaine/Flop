<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePollRequest;
use Illuminate\Http\Request;
use App\Models\Poll;
use App\Models\Option;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dernierSondage = Poll::orderByDesc('id')->first();
        $start_date = $start_date = Carbon::parse($dernierSondage->start_date);
        $duration = $dernierSondage->duration;
        $pollId = $dernierSondage->id;
        // Vérifier si le sondage est en cours
        if ($start_date->addMinutes($duration)->toDateTime() > now()) {
            // Si le sondage est en cours, retourner une vue pour l'édition du sondage en cours
            return redirect()->route('poll.edit', ['poll' => $pollId], compact('dernierSondage'));
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

        $user = Auth::user();

        $duration = $request->input('duration');

        $type = $request->input('type');

        $title = $request->input('title');

        $options = $request->input('options[]');

        if ($request->hasFile('files')) {
            $pictures = [];

            foreach ($request->file('files') as $file) {
                $path = $file->storePublicly('public/images');
                $pictures[] = Storage::url($path);
            }
        }

        Poll::create([
            'user_id' => $user->id,
            'title' => $title,
            'type' => $type,
            'duration' => now()->addMinutes($duration),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $result = DB::table('polls')->orderBy('id', 'desc')->first();
        $lastId = $result->id;

        for ($i = 0; $i < count($options); $i++) {
            Option::create([
                'id' => $lastId,
                'title' => $options[$i],
            ]);
        }

        Poll::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'duration' => $request->input('duration'),
            'user_id' => $request->input('user_id'),
            'start_date' => $request->input('start_date'),
        ]);

        foreach ($request->input('options') as $option) {
            Option::create([
                'title' => $option,
            ]);
        }

        return dd($request->all());
        // return redirect()->route('poll.create');
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
