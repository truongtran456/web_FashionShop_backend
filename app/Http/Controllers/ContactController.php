<?php

namespace App\Http\Controllers;

use App\Http\Services\Contact\ContactService;
use Illuminate\Http\Request;

class ContactController
{
    protected $contact;

    public function __construct(ContactService $contact)
    {
//        $this->user_home=$user_home;
        $this->contact=$contact;
//        $this->productService = $productService;
    }
    public function store(Request $request)
    {
        $this->contact->insert($request);

        return redirect()->back();
    }

}
