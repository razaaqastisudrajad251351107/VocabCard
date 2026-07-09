<?php

namespace App\Http\Controllers;

use App\Models\Vocab;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class VocabController extends Controller
{
    public function index()
    {
        $vocabs = Vocab::with('category')->get();
        return view('vocabs.index', compact('vocabs'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('vocabs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'word' => 'required',
            'meaning' => 'required',
            'category_id' => 'required'
        ]);

        Vocab::create($request->all());

        return redirect()->route('vocabs.index');
    }

    public function edit(Vocab $vocab)
    {
        $categories = Category::all();
        return view('vocabs.edit', compact('vocab', 'categories'));
    }

    public function update(Request $request, Vocab $vocab)
    {
        $vocab->update($request->all());

        return redirect()->route('vocabs.index');
    }

    public function destroy(Vocab $vocab)
{
    try {
        $vocab->delete();

        return redirect()->route('vocabs.index')
            ->with('success', 'Kosakata berhasil dihapus.');
    } catch (QueryException $e) {
        return redirect()->route('vocabs.index')
            ->with('error', 'Kosakata tidak dapat dihapus karena masih berada di daftar Sentence atau Favorit. Hapus dari menu Sentence/Favorit terlebih dahulu.');
    }
}
}