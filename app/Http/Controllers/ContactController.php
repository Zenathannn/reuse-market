<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'number' => 'required|string|max:12',
            'message' => 'required|string|max:500',
        ]);

        Message::create([
            'user_id' => Auth::id(),
            'name' => $validated['name'],
            'email' => $validated['email'],
            'number' => $validated['number'],
            'message' => $validated['message'],
        ]);

        return back()->with('success', 'Pesan Anda berhasil dikirim!');
    }
}
