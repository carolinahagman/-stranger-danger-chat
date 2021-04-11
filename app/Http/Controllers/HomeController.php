<?php

namespace App\Http\Controllers;

use Chats;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public static function index()
    {
        $requestingUser=Auth::user()->id;
        $userData = \App\Models\User::find($requestingUser);
        $chatData = array();
        
        $chatData = $userData->chats;
        return view('home',['user'=>$userData, 'chats'=>$chatData]);
    }


    
}
