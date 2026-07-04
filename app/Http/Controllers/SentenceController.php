<?php

namespace App\Http\Controllers;

use App\Models\Sentence;
use App\Models\Vocab;
use Illuminate\Http\Request;

class SentenceController extends Controller
{
    public function index()
    {
        $sentences = Sentence::with('vocab')->get();

        return view('sentences.index', compact('sentences'));
    }

    public function create()
    {
        $vocabs = Vocab::all();

        return view('sentences.create', compact('vocabs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vocab_id' => 'required',
            'english' => 'required',
            'indonesia' => 'required',
        ]);

        Sentence::create($request->all());

        return redirect()->route('sentences.index');
    }

    public function show(Sentence $sentence)
    {
        return view('sentences.show', compact('sentence'));
    }

    public function edit(Sentence $sentence)
    {
        $vocabs = Vocab::all();

        return view('sentences.edit', compact('sentence', 'vocabs'));
    }

    public function update(Request $request, Sentence $sentence)
    {
        $request->validate([
            'vocab_id' => 'required',
            'english' => 'required',
            'indonesia' => 'required',
        ]);

        $sentence->update($request->all());

        return redirect()->route('sentences.index');
    }

    public function destroy(Sentence $sentence)
    {
        $sentence->delete();

        return redirect()->route('sentences.index');
    }
}