<?php

namespace App\Http\Controllers;

use App\Events\ChatMessage;
use App\Models\Message;
use App\Models\Chat;
use App\Models\UserChat;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{
    public static function index(int $chatId)
    {
        $chatData = \App\Models\Chat::find($chatId);

        return view('chat', ['chat' => $chatData]);
    }
    public function data(int $chatId)
    {
        $chatData = \App\Models\Chat::find($chatId);
        return ['chat'=> $chatData];
    }

    public function newChat(Request $request){

        $chat = new Chat();

        $chat ->save();
        $chat->refresh();

        $requestingUser = Auth::user();
        // random number between 1 and number of users in system
        $randomId = rand(1, Chat::count());
        $randomUser =  User::find($randomId);

        $chat->users()->saveMany([$randomUser, $requestingUser]);

        $chat->refresh();

        return view('chat', ['chat' => $chat]);
        
    }

    public function sendMessage(Request $request, int $chat, int $user)
    {
     
        $message = new Message();
        $message->user_id = $user;
        $message->chat_id = $chat;
        $message->message = $request->input('message');
        $message->save();
        event(new ChatMessage($request->input('message')));
        return ChatsController::index($chat);
        // return "hello world";
    }

    

}
