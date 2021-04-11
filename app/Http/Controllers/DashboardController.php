<?php

namespace App\Http\Controllers;

use Chats;
use Illuminate\Http\Request;
class DashboardController extends Controller
{
    public function index(int $user)
    {
        // $user = \App\Models\User::find($user);

        return view('home',[]);
    }
}
