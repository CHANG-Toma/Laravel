<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all(['id', 'content', 'author_name', 'published_at']);
        return view('messages.index', compact('messages'));
    }
    
    public function show(Message $message)
    {
        return view('messages.show', compact('message'));
    }

    public function edit(Message $message)
    {
        return view('messages.edit', compact('message'));
    }

    public function update(Request $request, Message $message)
    {
        $message->message = $request->message;
        $message->save();
        return redirect()->route('home');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'content' => 'required', 'min:3',
            'author_name' => 'required', 'min:1', 'max:255',
        ]);

        $message = new Message();
        $message->content = $validateData['content'];
        $message->author_name = $validateData['author_name'];
        $message->save();
        return redirect()->back();
    }

    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->back();
    }

}
