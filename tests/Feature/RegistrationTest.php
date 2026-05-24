<?php

namespace Tests\Feature;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;
    public function test_can_register() : void
    {
        $response = $this->post(
            '/register',
            [
                'name' => 'testuser',
                'email' => 'testuser@gmail.com',
                'password' => 'testuser_ABC_123',
                'password_confirmation' => 'testuser_ABC_123',
                'newsletter' => false
            ]
        );

        $this->assertDatabaseHas('users', ['email' => 'testuser@gmail.com']);

        $response->assertRedirect('/');
        $this->assertAuthenticated();
    }

    public function test_can_register_with_existing() : void
    {
        User::factory()->create(['email' => 'existing@mail.com']);

        $response = $this->post('/register',
            [
                'name' => 'UserWithExistingEmail',
                'email' => 'existing@mail.com',
                'password' => 'testuser2_ABC_123',
                'password_confirmation' => 'testuser2_ABC_123',
                'newsletter' => true
            ]
        );

        $response->assertSessionHasErrors('email');
    }
}