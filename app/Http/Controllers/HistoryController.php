<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\User;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $histories = History::with('user')->get();

        return view('histories.index', compact('histories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();

        return view('histories.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'score' => 'required|numeric',
            'total_question' => 'required|numeric',
        ]);

        History::create($request->all());

        return redirect()->route('histories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(History $history)
    {
        return view('histories.show', compact('history'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(History $history)
    {
        $users = User::all();

        return view('histories.edit', compact('history', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, History $history)
    {
        $request->validate([
            'user_id' => 'required',
            'score' => 'required|numeric',
            'total_question' => 'required|numeric',
        ]);

        $history->update($request->all());

        return redirect()->route('histories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(History $history)
    {
        $history->delete();

        return redirect()->route('histories.index');
    }
}