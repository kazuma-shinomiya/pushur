<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Events\SendMessage;

class MessageController extends Controller
{
    public function fetchMessages(User $receiver)
    {
        $query = Message::where('sender', Auth::id())->where('receiver', $receiver->id)->orWhere(function($query) use($receiver){
            $query->where('sender', $receiver->id)->where('receiver', Auth::id());
        });
        $messages = $query->get();
        return $messages;
    }
    
    public function sendMessage(Request $request, Message $message)
    {
        $message = Message::create($request->all());
        
        broadcast(new SendMessage($message))->toOthers();
        return $message;
    }
}
