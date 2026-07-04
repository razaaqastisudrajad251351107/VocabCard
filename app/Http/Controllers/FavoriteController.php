<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Vocab;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Favorite::with(['user', 'vocab'])->get();

        return view('favorites.index', compact('favorites'));
    }

    public function create()
    {
        $vocabs = Vocab::all();

        return view('favorites.create', compact('vocabs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vocab_id' => 'required',
        ]);

        Favorite::create([
            'user_id' => auth()->id(),
            'vocab_id' => $request->vocab_id,
        ]);

        return redirect()->route('favorites.index');
    }

    public function show(Favorite $favorite)
    {
        return view('favorites.show', compact('favorite'));
    }

    public function edit(Favorite $favorite)
    {
        $vocabs = Vocab::all();

        return view('favorites.edit', compact('favorite', 'vocabs'));
    }

    public function update(Request $request, Favorite $favorite)
    {
        $request->validate([
            'vocab_id' => 'required',
        ]);

        $favorite->update([
            'vocab_id' => $request->vocab_id,
        ]);

        return redirect()->route('favorites.index');
    }

    public function destroy(Favorite $favorite)
    {
        $favorite->delete();

        return redirect()->route('favorites.index');
    }
}