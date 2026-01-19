<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function get_all_contacts_admin(){
        $contacts = Contact::all();

        return view('pages-admin/contacts-admin', compact('contacts'));
    }

    public function index() 
    {
        return view('contact');
    }
}
