<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vocab;
use App\Models\History;
use Illuminate\Support\Facades\Auth;

class FlashcardController extends Controller
{
    public function index()
    {
        $vocabs = Vocab::orderBy('id')->get();

        if ($vocabs->isEmpty()) {
            return back()->with('error', 'Data vocabulary belum tersedia.');
        }

        if (!session()->has('index')) {
            session([
                'index' => 0,
                'score' => 0,
                'question' => 1,
            ]);
        }

        $index = session('index');

        // Jika semua vocabulary sudah selesai
        if ($index >= $vocabs->count()) {

            History::create([
                'user_id' => Auth::id(),
                'score' => session('score'),
                'total_question' => $vocabs->count(),
            ]);

            session()->forget([
                'index',
                'score',
                'question',
                'correct_answer',
            ]);

            return redirect()
                ->route('histories.index')
                ->with('success', 'Permainan selesai. Skor berhasil disimpan.');
        }

        $vocab = $vocabs[$index];

        $fakeMeanings = Vocab::where('id', '!=', $vocab->id)
            ->pluck('meaning');

        if ($fakeMeanings->isEmpty()) {

            $meaning = $vocab->meaning;
            $isCorrect = true;

        } else {

            $isCorrect = rand(0,1);

            if($isCorrect){

                $meaning = $vocab->meaning;

            }else{

                $meaning = $fakeMeanings->random();

            }

        }

        session([
            'correct_answer' => $isCorrect,
        ]);

        return view('flashcard.index', compact('vocab','meaning'));
    }

    public function check(Request $request)
    {
        $correct = session('correct_answer');
        $answer = $request->answer == 'true';

        if($answer == $correct){

            session([
                'score' => session('score') + 1
            ]);

            $message = '✅ Jawaban Benar!';

        }else{

            $message = '❌ Jawaban Salah!';

        }

        session([
            'index' => session('index') + 1,
            'question' => session('question') + 1,
        ]);

        return redirect()
            ->route('flashcard.index')
            ->with('success', $message);
    }

    public function restart()
    {
        session()->forget([
            'index',
            'score',
            'question',
            'correct_answer',
        ]);

        return redirect()->route('flashcard.index');
    }
}