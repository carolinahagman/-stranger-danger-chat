<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_view_login_form()
    {
        $response = $this->get('/login');
        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    public function test_login_user()
    {
        $user = new User();
        $user->username = 'testuser1';
        $user->email = 'example1@test.se';
        $user->password = Hash::make('123');
        $user->save();

        $response = $this
            ->followingRedirects()
            ->post('login', [
                'email' => 'example1@test.se',
                'password' => '123',
            ]);

        $response->assertSeeText($user['username']);
    }

    public function test_login_failed()
    {
        $response = $this
            ->followingRedirects()
            ->post('login', [
                'email' => 'invalid@email.com',
                'password' => 'invalid-password',
            ]);

        $response->assertDontSeeText('Welcome');
    }
}
