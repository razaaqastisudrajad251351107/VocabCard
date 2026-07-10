<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class AIController extends Controller
{
    public function generateSentence($word)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('services.groq.key'),
            'Content-Type' => 'application/json',
        ])->post('https://api.groq.com/openai/v1/chat/completions', [

            'model' => 'llama-3.3-70b-versatile',

            'messages' => [
                [
                    'role' => 'user',
                    'content' => "Buatkan SATU contoh kalimat bahasa Inggris menggunakan kata '$word', kemudian berikan terjemahan bahasa Indonesianya.

Balas HANYA dengan format JSON seperti ini tanpa penjelasan:

{
  \"english\":\"...\",
  \"indonesia\":\"...\"
}"
                ]
            ]
        ]);

        if ($response->failed()) {
            return response()->json([
                'error' => 'Gagal menghubungi AI'
            ], 500);
        }

        $content = $response['choices'][0]['message']['content'];

        return response()->json(json_decode($content, true));
    }
}