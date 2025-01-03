<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use App\Models\Designer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
       
        $designers = Designer::orderBy('İsim')->get();
        
        
        $conversations = Message::where('sender_id', Auth::id())
            ->orWhere('receiver_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy(function ($message) {
                return $message->sender_id == Auth::id() 
                    ? $message->receiver_id 
                    : $message->sender_id;
            })
            ->map(function ($messages) {
                $lastMessage = $messages->first();
                $userId = $lastMessage->sender_id == Auth::id() 
                    ? $lastMessage->receiver_id 
                    : $lastMessage->sender_id;
                    
                return [
                    'user_id' => $userId,
                    'last_message' => $lastMessage->created_at,
                    'unread_count' => $messages->where('receiver_id', Auth::id())
                                             ->where('is_read', false)
                                             ->count()
                ];
            });

        return view('messages.index', compact('designers', 'conversations'));
    }

    public function show($userId)
    {
        
        $otherUser = Designer::find($userId) ?? User::findOrFail($userId);
        
        
        Message::where('sender_id', $userId)
            ->where('receiver_id', Auth::id())
            ->where('is_read', false)
            ->update(['is_read' => true]);

        
        $messages = Message::where(function($query) use ($userId) {
            $query->where('sender_id', Auth::id())
                  ->where('receiver_id', $userId);
        })->orWhere(function($query) use ($userId) {
            $query->where('sender_id', $userId)
                  ->where('receiver_id', Auth::id());
        })
        ->orderBy('created_at', 'asc')
        ->get();

        return view('messages.show', compact('messages', 'otherUser'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'content' => 'required|string|max:1000'
        ]);

        Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'content' => $request->content,
            'is_read' => false
        ]);

        return redirect()->back();
    }
}