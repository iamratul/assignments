<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

// Task 6: Single Action Controller
class ContactController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Send an email with the submitted data
        Mail::send([], [], function ($message) use ($validatedData) {
            $message->to('your-email@example.com')
                ->subject('New Contact Form Submission')
                ->setBody("
                    Name: {$validatedData['name']}
                    Email: {$validatedData['email']}
                    Message: {$validatedData['message']}
                ");
        });

        // Redirect back or return a success response
        return redirect()->back()->with('success', 'Thank you for your message!');
    }
}
