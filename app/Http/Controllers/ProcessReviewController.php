<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProcessReviewController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, int $reviewId)
    {
        return 'Process review ' . $reviewId;
    }
}
