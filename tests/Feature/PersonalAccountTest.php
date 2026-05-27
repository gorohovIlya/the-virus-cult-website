<?php

// tests/Feature/Pages/PersonalAccountTest.php
namespace Tests\Feature\Pages;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PersonalAccountTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_authenticated_user_can_access_personal_account(): void
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)->get('/personal-account');
        
        $response->assertStatus(200);
        $response->assertViewIs('auth.personal-account');
    }
    
    public function test_guest_cannot_access_personal_account(): void
    {
        $response = $this->get('/personal-account');
        
        $response->assertRedirect('/login');
    }
    
    public function test_unverified_user_cannot_access_personal_account(): void
    {
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);
        
        $response = $this->actingAs($user)->get('/personal-account');
        
        $response->assertStatus(200);
    }
}