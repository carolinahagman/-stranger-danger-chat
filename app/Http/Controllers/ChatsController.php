<?php

namespace App\Http\Controllers;

use App\Models\Message;
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

    public function sendMessage(Request $request, int $chat, int $user)
    {
        $message = new Message();
        $message->user_id = $user;
        $message->chat_id = $chat;
        $message->message = $request->input('message');
        $message->save();
        return ChatsController::index($chat);
    }
}
