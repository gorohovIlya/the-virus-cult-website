<?php

namespace TheVirusCult\Core\Domain\Services;

/**
 * Domain service for rating calculations.
 * This is a reusable component independent of any framework.
 */
class RatingCalculator
{
    /**
     * Calculate average rating from collection of ratings.
     * 
     * @param array<int> $ratings
     * @return float
     */
    public function calculateAverage(array $ratings): float
    {
        if (empty($ratings)) {
            return 0.0;
        }
        
        $sum = array_sum($ratings);
        $count = count($ratings);
        
        return round($sum / $count, 1);
    }
    
    /**
     * Validate if rating is within allowed range.
     * 
     * @param int $rating
     * @return bool
     */
    public function isValidRating(int $rating): bool
    {
        return $rating >= 1 && $rating <= 5;
    }
    
    /**
     * Validate if user can submit another review.
     * Business rule: one review per user.
     * 
     * @param bool $hasExistingReview
     * @return bool
     */
    public function canSubmitReview(bool $hasExistingReview): bool
    {
        return !$hasExistingReview;
    }
}