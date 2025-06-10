<?php

namespace App\Http\Controllers;

use App\Helpers\SeoHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        SeoHelper::contact();
        return view('home.contact');
    }

    public function send(Request $request)
    {
        // Anti-bot: cek honeypot
        if ($request->filled('website')) {
            return back()->with('success', 'Thank you!');
        }

        $email = $request->email;

        // Cegah spam: batasi pengiriman dari email yang sama dalam 5 menit
        if (Cache::has("contact_sent_$email")) {
            return back()->with('error', 'You have already sent a message. Please wait a few minutes before trying again.');
        }

        $request->validate([
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        $data = [
            'email' => $email,
            'messageBody' => $request->message
        ];

        Mail::send('emails.contact', $data, function($message) use ($data) {
            $message->to('ahmadridhomaulanaa@gmail.com') // ← Ganti dengan email penerima kamu
                    ->subject('New Contact Message from Ernov Website');
        });

        // Simpan ke cache untuk mencegah spam
        Cache::put("contact_sent_$email", true, now()->addMinutes(5));

        return back()->with('success', 'Your message has been sent successfully!');
    }
}
