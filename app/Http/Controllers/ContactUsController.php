<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('frontend.contact.index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'        => 'required|string|max:150',
            'mail'        => 'required|email|max:150',
            'number'      => 'required|string|max:30',
            'subject'     => 'required|string|max:100',
            'messagewr2'  => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please correct the errors.',
                'errors'  => $validator->errors()
            ], 422);
        }

        ContactMessage::create([
            'full_name'   => $request->name,
            'email'       => $request->mail,
            'phone'       => $request->number,
            'subject'     => $request->subject,
            'message'     => $request->messagewr2,
            'ip_address'  => $request->ip(),
        ]);


        return response()->json([
            'success' => true,
            'message' => 'Thank you! Your message has been sent successfully.'
        ]);
    }
}