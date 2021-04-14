<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_view_user_profile()
    {
        $user = User::factory()->create();
        $user->save();

        $response = $this
            ->actingAs($user)
            ->get('/user/' . $user->id);

        $response->assertSeeText('Profile of ' . $user['username']);
    }

    public function test_view_user_edit()
    {
        $user = User::factory()->create();
        $user->save();

        $response = $this
            ->followingRedirects()
            ->actingAs($user)
            ->get('/edit/user/');

        $response->assertSeeText('Update Profile');
    }

    public function test_user_update()
    {
        $user = User::factory()->create();
        $user->save();

        $response = $this
            ->followingRedirects()
            ->actingAs($user)
            ->post('/edit/user/', [
                'username' => 'newUsername',
                'email' => 'newEmail@email.se'
            ]);

        $response->assertSeeText('Your profile has been updated.');
    }

    public function test_view_password_edit()
    {
        $user = User::factory()->create();
        $user->save();

        $response = $this
            ->followingRedirects()
            ->actingAs($user)
            ->get('/edit/password/user/');

        $response->assertSeeText('Change Password');
    }

    public function test_password_change()
    {
        $user = User::factory()->create();
        $user->password = '1234qwer';
        $user->save();

        $response = $this
            ->followingRedirects()
            ->actingAs($user)
            ->post('/edit/password/user/', [
                'currentPassword' => '1234qwer',
                'newPassword' => 'awesome-password',
                'password_confirmation' => 'awesome-password'
            ]);

        $response->assertStatus(200);
        $response = $this->get('/edit/password/user/');
        $response->assertViewIs('user.password');
    }

    public function test_delete_user_account()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->followingRedirects()
            ->post(
                '/user/' . $user->id,
                ['username' => $user->username]
            );

        $response = $this->assertDatabaseMissing('users', ['username' => $user->username]);

        $response = $this->get('/login');
        $response->assertStatus(302);
    }
}
