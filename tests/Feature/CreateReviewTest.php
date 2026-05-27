<?php

namespace Tests\Feature\Reviews;

use Tests\TestCase;
use App\Models\User;
use App\Models\Review;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateReviewTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_create_review(): void
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)
                         ->post("/feedback", [
                            'rating' => 3,
                            'comment' => 'It`s okay.'
                         ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('reviews', [
            'user_id' => $user->id,
            'rating' => 3,
            'comment' => 'It`s okay.'
        ]); 
    }

    public function test_guest_cannot_create_review(): void
    {
        $response = $this->post("/feedback", [
            'rating' => 5,
            'comment' => 'Nice!',
        ]);
        
        $response->assertRedirect('/login');
    }

    public function test_user_can_create_only_one_review(): void
    {
        $user = User::factory()->create();
        
        Review::factory()->create([
            'user_id' => $user->id,
        ]);
        
        $response = $this->actingAs($user)
                         ->post("/feedback", [
                             'rating' => 4,
                             'comment' => 'Second review',
                         ]);
        
        $response->assertSessionHas('error', 'Вы уже оставили отзыв');
        $this->assertDatabaseCount('reviews', 1);
    }

    public function test_review_requires_valid_rating(): void
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)
                         ->post("/feedback", [
                             'rating' => 6,
                             'comment' => 'Too high rating',
                         ]);
        
        $response->assertSessionHasErrors('rating');
    }
}