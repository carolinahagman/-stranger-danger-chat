<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    public function test_view_registration_form()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_register_user()
    {
        $user = \App\Models\User::factory()->make();

        $response = $this->post('register', [
            'username' => $user->username,
            'email' => $user->email,
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);

        $response->assertStatus(302);

        $this->assertAuthenticated();
    }
}
