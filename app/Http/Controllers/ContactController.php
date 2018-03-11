<?php

namespace App\Http\Controllers;

use App\Mail\ContactEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function getContact()
    {
        return view('contact');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postContact(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'body' => 'required',
        ]);

        $data = $this->sanitize($validatedData);
        Mail::send(new ContactEmail($data));

        $data['email'] = substr($data['email'], 0, min(-7, strlen($data['email']))) . '...';
        Log::info('EMAIL: Contact email sent with the following info: ' . print_r($data, true));
        return redirect()->back()->with('success', 'Message sent!');
    }

    /**
     * @param array $data
     * @return array
     */
    protected function sanitize(array $data)
    {
        foreach ($data as $key => $value) {
            $data[$key] = trim(strip_tags($value));
        }
        return $data;
    }
}
