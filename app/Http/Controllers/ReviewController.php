<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController
{
    public function index(Request $request) : string
    {
        echo $request->headers->get('X-Request-Id') . '<br>';
        return 'Reviews page';
    }

    public function show(int $reviewId) : string 
    {
        return 'Review ' . $reviewId;
    }

    public function create() : string
    {
        return 'Form to create a review';
    }

    public function store(Request $request) 
    {
        return 'Review created';
    }
}
