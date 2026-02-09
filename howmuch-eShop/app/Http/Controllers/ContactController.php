<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Repositories\ContactRepository;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function __construct(private readonly ContactRepository $contactRepository){}

    public function getAllContactsForAdmin(){
        
        $contacts = $this->contactRepository->getAll();
        return view('pages-admin/contacts-admin', compact('contacts'));
    }

    public function index() 
    {
        return view('contact');
    }

    public function sendMessageFromContactPage(ContactRequest $request){

        $this->contactRepository->create($request->validated());
        return back()->with('success','Message has been sent successfully.');
    }

    public function deleteContactById(Contact $contact)
    {
        $success = $this->contactRepository->delete($contact);

        if(! $success){
            return back()->with('message', 'Failed to delete contact');
        }

        return back()->with('success', 'Contact has been successfully deleted.');
    }

    // Update
    public function getContactForUpdateById(Contact $contact)
    {
        return view('pages-admin/update-contact-admin', compact('contact'));
    }

    public function updateContactById(ContactRequest $request, Contact $contact)
    {
        $this->contactRepository->update($contact, $request->validated());

        return redirect()->route('contact.getAllContactsForAdmin')->with('success', 'Contact has been successfully updated.');
    }
}
