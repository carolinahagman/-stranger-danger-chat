<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_view_login_form()
    {
        $response = $this->get('/login');
        $response->assertSuccessful();
        $response->assertStatus(200);
        $response->assertViewIs('auth.login');
    }

    public function test_login_user()
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->followingRedirects()
            ->post('login', [
                'email' => '$user->faker->unique()->safeEmail',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ]);

        $response->assertStatus(200);
        $response->assertSeeText($user['username']);
    }

    public function test_login_with_wrong_credentials()
    {
        $user = User::factory()->create();

        $response = $this
            ->followingRedirects()
            ->post('login', [
                'email' => 'invalid@email.com',
                'password' => 'invalid-password',
            ]);

        $response->assertDontSeeText('Welcome' . $user->username . '!');
    }
}
