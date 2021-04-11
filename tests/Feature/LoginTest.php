<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_view_login_form()
    {
        $response = $this->get('/login');
        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    public function test_login_user()
    {
        $user = new User();
        $user->username = 'gusjak';
        $user->email = 'gusjak@yrgo.se';
        $user->password = Hash::make('1234qwer');
        $user->save();

        $response = $this
            ->followingRedirects()
            ->post('login', [
                'email' => 'gusjak@yrgo.se',
                'password' => '1234qwer',
            ]);

        $response->assertSeeText('You are logged in!');
    }

    public function test_login_failed()
    {
        $response = $this
            ->followingRedirects()
            ->post('login', [
                'email' => 'invalid@email.com',
                'password' => 'invalid-password',
            ]);

        $response->assertDontSeeText('You are logged in!');
    }
}
