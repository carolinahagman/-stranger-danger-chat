<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    use RefreshDatabase;

    public function test_logout()
    {
        $user = User::factory()->create();
        $user->save();

        $response = $this
            ->followingRedirects()
            ->actingAs($user)
            ->get('/logout');

        $response = Auth::logout();

        $response = $this->get('/');
        $response->assertViewIs('welcome');
    }
}
