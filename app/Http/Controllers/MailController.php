<?php

namespace App\Http\Controllers;

use App\Models\GenericMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function create() {
        return view('mail/create');
    }

    public function send(Request $request) {
        $data = ['message' => 'TEST!'];

        Mail::to($request->get('mail'))->send(new GenericMail($data));

        return redirect()->route('mail.create');
    }
}
