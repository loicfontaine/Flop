<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePollRequest;
use App\Models\Poll;

class PollController extends Controller
{
    public function store(CreatePollRequest $request)
    {
        $poll = auth()->user()->polls()->create($request->safe()->except('options'));

        $poll->options()->createMany([$request->options]);

        dd($request->options);
        return back();
    }

    public function index()
    {
        $polls = auth()->user()->polls()->select('title', 'description')->paginate(10);

        return view('polls.list', compact('poll'));
    }

    public function edit(Poll $poll)
    {
        $poll = $poll->load('options');
        return view('polls.update', compact('poll'));
    }
}
