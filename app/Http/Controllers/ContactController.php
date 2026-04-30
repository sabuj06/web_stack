<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller {
    public function submit(Request $request) {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'nullable|string|max:20',
            'service' => 'nullable|string',
            'message' => 'required|string|min:10',
        ]);

        Contact::create($request->only(
            'name', 'email', 'phone', 'service', 'message'
        ));

        return redirect()->route('contact')
            ->with('success', 'Your inquiry has been sent successfully!');
    }
}