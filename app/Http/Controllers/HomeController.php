<?php

namespace App\Http\Controllers;

use Chats;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    public function index(int $user)
    {
        $requestingUser=Auth::user()->id;
        $userData = \App\Models\User::find($requestingUser);
        $chatData = array();
        if($requestingUser !== $user){
            return view('home',['user'=>$userData, 'chats'=>$chatData]);
        }
        
        $chatData = $userData->chats;
        // $messages = $chatData->first()->messages;
        // dd($messages);
        return view('home',['user'=>$userData, 'chats'=>$chatData]);
    }

    
}
