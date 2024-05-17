<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletter,email',
        ]);

        Newsletter::create(['email' => $request->input('email')]);

        return redirect()->back()->with('success', 'Subscribed successfully!');
    }
}
