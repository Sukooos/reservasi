<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reviews;


class ReviewController extends Controller
{
    public function create()
    {
        return view('reviews.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review_text' => 'nullable|string|max:500'
        ]);

        Reviews::create([
            'user_id' => auth()->id(),
            'rating' => $request->rating,
            'review_text' => $request->review_text
        ]);

        return redirect()->route('home')->with('success', 'Thank you for your review!');
    }
}
