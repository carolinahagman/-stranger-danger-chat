<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    public function test_logout()
    {
        $user = new User();
        $user->username = 'testuser';
        $user->email = 'example@test.se';
        $user->password = Hash::make('123');
        $user->save();

        $response = $this
            ->followingRedirects()
            ->get('/logout');

        $response->assertViewIs('welcome');
    }
}
