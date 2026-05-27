<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmailVerificationTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_email_verification_notice_is_shown(): void
    {
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);
        
        $response = $this->actingAs($user)->get('/email/verify');
        
        $response->assertStatus(200);
        $response->assertViewIs('auth.verify-email');
    }
    
    public function test_user_can_verify_email(): void
    {
        Event::fake();
        
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);
        
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => $user->id, 'hash' => sha1($user->email)]
        );
        
        $response = $this->actingAs($user)->get($verificationUrl);
        
        Event::assertDispatched(Verified::class);
        $this->assertNotNull($user->fresh()->email_verified_at);
        $response->assertRedirect('/register/success');
    }
    
    public function test_verified_user_cannot_verify_again(): void
    {
        $user = User::factory()->create([
            'email_verified_at' => now(),
        ]);
        
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => $user->id, 'hash' => sha1($user->email)]
        );
        
        $response = $this->actingAs($user)->get($verificationUrl);
        
        $response->assertRedirect('/register/success');
    }
    
    public function test_user_can_request_new_verification_link(): void
    {
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);
        
        $response = $this->actingAs($user)
                         ->post('/email/verification-notification');
        
        $response->assertSessionHas('message', 'Verification link sent!');
    }
}