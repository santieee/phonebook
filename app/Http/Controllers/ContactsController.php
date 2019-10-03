<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactsController extends Controller
{

    public function index()
    {
        $contacts = Contact::all();
        return response()->json([
            'data' => $contacts,
            'success' => true
        ]);
    }

  
    public function store(Request $request)
    {
        $contact = new Contact(['name' => $request->name, 'email' => $request->email, 'phone' =>  $request->phone]);
        $contact->save();
        return response()->json([
            'success' => true
        ]);
    }

    public function show($id)
    {
        $contact = Contact::find($id);

        return response()->json([
            'data' => $contact
        ]);
    }

    public function update(Request $request, $id)
    {   
        $contact = Contact::find($id);
        $contact->update(['name' => $request->name, 'email' => $request->email, 'phone' =>  $request->phone]);
        return response()->json([
            'success' => true
        ]);
    }

    public function destroy($id)
    {
        if(Contact::destroy($id)){
            return response()->json([
                'success' => true
            ]);
        }
    }
}
