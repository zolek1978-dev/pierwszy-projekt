<?php

namespace App\Http\Controllers;

use App\Models\Wpis;

class BlogController extends Controller
{
    public function index()
    {
        $wpisy = Wpis::with(['autor', 'kategoria', 'tagi'])
            ->where('status', 'opublikowany')
            ->orderByDesc('data_publikacji')
            ->paginate(9);

        return view('blog.index', compact('wpisy'));
    }

    public function show($slug)
    {
        $wpis = Wpis::with(['autor', 'kategoria', 'tagi'])
            ->where('slug', $slug)
            ->where('status', 'opublikowany')
            ->firstOrFail();

        $podobneWpisy = Wpis::with(['kategoria'])
            ->where('id', '!=', $wpis->id)
            ->where('status', 'opublikowany')
            ->where('kategoria_wpisu_id', $wpis->kategoria_wpisu_id)
            ->take(3)
            ->get();

        return view('blog.show', compact('wpis', 'podobneWpisy'));
    }
}
