<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use Illuminate\Http\Request;
use Illuminate\Mail\Events\MessageSent;

class MensajeController extends Controller
{
    public function sent(Request $request)
    {

        $message = $request->user()->messages()->create([
            'texto' => $request->texto,
            'idChat' => $request->idChat
        ])->load('user');

        broadcast(new MessageSent($message))->toOthers();

        return $message;

    }
}
