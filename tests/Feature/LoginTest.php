<?php

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_login() : void
    {
        $user = User::factory()->create(
            [
                'name' => 'testlogin',
                'email' => 'testlogin@mail.com',
                'password' => bcrypt('testloginpsswd')
            ]
        );

        $response = $this->post(
            '/login',
            [
                'email' => 'testlogin@mail.com',
                'password' => 'testloginpsswd'
            ]
        );

        $response->assertRedirect('/');
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
}