<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_view_user_profile()
    {
        $user = new User();
        $user->username = 'testuser';
        $user->email = 'example@test.se';
        $user->password = Hash::make('123');
        $user->save();

        $response = $this
            ->actingAs($user)
            ->get('/user/' . $user->id);

        $response->assertSeeText('Profile of ' . $user['username']);
    }

    public function test_view_user_edit()
    {
        $user = new User();
        $user->username = 'testuser';
        $user->email = 'example@test.se';
        $user->password = Hash::make('123');
        $user->save();

        $response = $this
            ->followingRedirects()
            ->actingAs($user)
            ->get('/edit/user/');

        $response->assertSeeText('Update Profile');
    }

    public function test_user_update()
    {
        $user = new User();
        $user->username = 'testuser';
        $user->email = 'example@test.se';
        $user->password = Hash::make('123');
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
        $user = new User();
        $user->username = 'testuser';
        $user->email = 'example@test.se';
        $user->password = Hash::make('123');
        $user->save();

        $response = $this
            ->followingRedirects()
            ->actingAs($user)
            ->get('/edit/password/user/');

        $response->assertSeeText('Change Password');
    }

    public function test_delete_user_account()
    {
        $user = new User();
        $user->username = 'testuser';
        $user->email = 'example@test.se';
        $user->password = Hash::make('123');
        $user->save();

        $response = $this
            ->followingRedirects()
            ->actingAs($user)
            ->post('/user/' . $user->id);

        $user->delete();

        $response->assertDontSeeText('Your account has successfully been deleted.');
    }
}
