<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function getAllContactsForAdmin(){
        $contacts = Contact::all();

        return view('pages-admin/contacts-admin', compact('contacts'));
    }

    public function index() 
    {
        return view('contact');
    }
}
