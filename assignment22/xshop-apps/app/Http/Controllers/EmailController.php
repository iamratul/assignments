<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendMail()
    {
        return view('pages.email.send-mail-page');
    }

    public function sendPromotionalMail(Request $request)
    {
        $email = $request->input('email');
        $mailSubject = $request->input('mailSubject');
        $mailContent = $request->input('mailContent');

        try {
                Mail::to($email)->send(new SendMail($mailSubject, $mailContent)); // send mail
                return response()->json([
                    'status' => 'success',
                    'message' => 'Promotional emails sent successfully.',
                ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Email not sent.',
            ]);
        }
    }
}
