<?php

namespace Tests\Feature\Auth;  // Добавлен namespace

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_login() : void
    {
        $user = User::factory()->create([
            'email' => 'testlogin@mail.com',
            'password' => bcrypt('testloginpsswd')
        ]);

        $response = $this->post('/login', [
            'email' => 'testlogin@mail.com',
            'password' => 'testloginpsswd'
        ]);

        $response->assertRedirect('/'); // Ваш редирект после логина
        $this->assertAuthenticatedAs($user);
    }

    public function test_user_can_logout(): void
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)
                         ->post('/logout');
        
        $response->assertRedirect('/');
        $this->assertGuest();
    }
    
    public function test_user_cannot_login_with_wrong_password(): void
    {
        User::factory()->create([
            'email' => 'user@example.com',
            'password' => bcrypt('correct123')
        ]);
        
        $response = $this->post('/login', [
            'email' => 'user@example.com',
            'password' => 'wrong123'
        ]);
        
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }
}