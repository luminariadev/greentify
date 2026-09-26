<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactFormController extends Controller
{
    public function showForm(): View
    {
        return view('contact');
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Pesan::create($validatedData);

        return back()->with('success', 'Your message has been sent successfully!');
    }
}
