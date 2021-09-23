<?php

namespace App\Http\Controllers\Api;

use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ContactForm;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = ['success' => false];
        $data = $request->all();
        $contact = new Contact();
        $contact->fill($data);

        $resp = $contact->save();
        
        if($resp){
            Mail::to($data['email'])->send(new ContactForm());
            $status['success'] = true;
        }

        return $status;
    }
}
