<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Challenge;

class ChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //return view('creation_challenge');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Challenge::create([
            'lastname' => $request->input('lastname'),
            'firstname' => $request->input('firstname'),
            'nickname' => $request->input('nickname'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'password' => $request->input('password'),
            "color_coins" => 10,
        ]);

        return view("test");
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
