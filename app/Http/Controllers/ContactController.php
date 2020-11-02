<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ContactValidateRequest;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($person_id)
    {
        return Contact::where('person_id', $person_id)->get();
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactValidateRequest $request, $person_id)
    {
        $person = Person::findOrFail($person_id);
        $data = $request->all();
        $data['person_id'] = $person_id;
        return Contact::create($data);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($person_id, $id)
    {
        return Contact::where('person_id', $person_id)->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactValidateRequest $request, $person_id, $id)
    {
        $contact = Contact::where('person_id', $person_id)->findOrFail($id);
        
        if ( $contact->update($request->all()) ) {
            return $contact;
        } else {
            return response()->json(['message' => 'Error to store'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($person_id, $id)
    {
        
        $contact = Contact::findOrFail($id);
        return $contact->delete();
    }
}
