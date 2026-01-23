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

    public function sendMessageFromContactPage(Request $request){

        $validated = $request->validate([
            'email' => 'required|email|max:64',
            'subject' => 'required|string|min:5',
            'message' => 'required|string|min:10'
        ]);

        Contact::create($validated);

        return back()->with('success','Message has been send successfully');
    }

    public function deleteContactById($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return back()->with('success', 'Contact has been successfully deleted');
    }
}
