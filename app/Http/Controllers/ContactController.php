<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendContactMessageRequest;
use App\Mail\ContactMessageReceived;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Show the contact page.
     *
     * @return \Illuminate\Foundation\Application|\Illuminate\View\View|mixed|null
     */
    public function index()
    {
        return view('contact');
    }

    /**
     * Send a message.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendMessage(SendContactMessageRequest $request)
    {
        Mail::to(config('app.contact_mail'))->queue(
            new ContactMessageReceived(
                name: $request->get('name'),
                company: $request->get('company'),
                email: $request->get('email'),
                enteredMessage: $request->get('message'),
            )
        );

        return redirect()->route('contact')
            ->with('success', 'Message sent! We will get back to you soon.');
    }
}
