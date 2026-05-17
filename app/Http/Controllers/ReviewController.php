<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController
{
    public function index()
    {
        $userReview = null;
        if (Auth::check()) {
            $userReview = Review::where('user_id', Auth::id())->first();
        }
        
        $reviews = Review::with('user')->latest()->take(10)->get();
        
        return view('feedback', compact('userReview', 'reviews'));
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Войдите, чтобы оставить отзыв');
        }

        if (Review::where('user_id', Auth::id())->exists()) {
            return back()->with('error', 'Вы уже оставили отзыв');
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:2000',
        ], [
            'rating.required' => 'Пожалуйста, поставьте оценку',
            'rating.min' => 'Оценка должна быть от 1 до 5',
            'rating.max' => 'Оценка должна быть от 1 до 5',
            'comment.max' => 'Комментарий не должен превышать 2000 символов',
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->route('feedback')->with('success', 'Спасибо за отзыв!');
    }
}