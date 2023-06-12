<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Challenge;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getInfo()
    {
        $challenges = Challenge::where("end_time", ">", date("Y-m-d H:i:s"))->get();

        $rewards = [];
        foreach ($challenges as $challenge) {
            if ($challenge->is_contest) {
                $rewards[$challenge->id] = $challenge->rewards;
            }
        }


        return response()->json(array("challenges" => $challenges, "rewards" => $rewards));
    }
}
