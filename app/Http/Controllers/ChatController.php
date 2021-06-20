<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function chat_with(Request $request, User $user)
    {
        $user_a = $request->user()->id;
        $user_b = $user;
        $chat = $user_a->chats()->wherehas('users', function ($q) use ($user_b) {
            $q->where('chat.idUsuario2', $user_b->id);
        })->first();

        if(!$chat){
            $chat = Chat::create([]);
            $chat->users()->sync([$user_a->id, $user_b->id]);
        }

        return $chat;
    }

    public function mostrarChats(Request $request, Chat $chat)
    {
        abort_unless($chat->users->contains($request->user()->id), 403);
        return $chat; //Lista de mis chats

    }

    public function get_users(Chat $chat){
        $users = $chat->users;
        return response()->json([
            'users' => $users
        ]);

    }

    public function get_messages(Chat $chat){
        $messages = $chat->messages()->with('user')->get();

        return response()->json([
            'messages' => $messages
        ]);

    }
}
