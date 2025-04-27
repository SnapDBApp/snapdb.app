<?php

namespace App\Http\Controllers;

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
}
