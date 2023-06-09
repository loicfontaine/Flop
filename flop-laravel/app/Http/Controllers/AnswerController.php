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
                    if ($optionUserItem->option_id === $answerItem->id) {
                        $matchingOptions[] = $optionUserItem->option_id;
                    }
                }
            }

            dd($matchingOptions);
            if (count($matchingOptions) > 0) {
                // get l'option dans la table option avec l'id de l'option_user
                $matchingOption = DB::table('options')->where('id', $matchingOptions[0])->get();
                return "Vous avez déjà voté pour l'option : " . $matchingOption->title;
            } else {
                for ($i = 0; $i < count($answers); $i++) {
                    if($answers[$i] != null){
                        $user->options()->attach($answers[$i]);
                    }
                }
                $user->options;

                dd($matchingOptions);

                return "Votre vote a bien été pris en compte";
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
