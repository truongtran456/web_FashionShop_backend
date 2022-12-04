<?php

namespace App\Http\Services\Contact;

use App\Models\Contact;

class ContactService
{
    public function show()//show du lieu ra admin
    {
        return Contact::select('id','email','title', 'message','created_at')
            ->get();
    }

    public function insert($request)
    {
        Contact::create([
            'message' => $request->get('message'),
            'title' => $request->get('title'),
            'email' => $request->get('email')
        ]);
    }
    public function delete($request)
    {
        $contact = Contact::where('id', $request->input('id'))->first();
        if ($contact) {
            $contact->delete();
            return true;
        }
        return false;
    }

}
