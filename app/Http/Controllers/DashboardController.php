<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('vocabs')->get();
        $catLabels = $categories->pluck('nama_kategori');
        $catCounts = $categories->pluck('vocabs_count');

        return view('dashboard', compact('catLabels', 'catCounts'));
    }
}