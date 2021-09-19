<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Message;

class ChatController extends Controller
{
    public function index()
    {
        $users = User::where('id', '<>', Auth::id())->get();
        return view('chats.index', compact('users'));
    }
    
    public function show(User $receiver)
    {
        return view('chats.show', compact('receiver'));
    }
}
