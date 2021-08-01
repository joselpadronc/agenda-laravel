<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Models\Contact;
use App\Models\Email;
use App\Models\Phone;
use App\Models\User;
use App\Models\Level;

class ContactsController extends Controller
{
    public function index(Request $request) {

        $contact_name = $request->get('con_name');

        if(isset($contact_name)) {
            $contacts = Contact::select('*')->where('con_nom', 'LIKE', "%$contact_name%")->get();
        }else {
            $contacts = Contact::select('*')->where('con_sta', '=', 1)->paginate(20);
        }

        foreach($contacts as $contact) {
            $contact->email = Email::select('*')
                    ->where('con_id', '=', $contact->con_id)
                    ->where('cor_sta', '=', 1)
                    ->first();
            $contact->phone = Phone::select('*')
                    ->where('con_id', '=', $contact->con_id)
                    ->where('tel_sta', '=', 1)
                    ->first();
        }

        // dd(session()->all());
        return view('home', compact('contacts'));
    }

    public function create_contact() {
        return view('create_contact');
    }

    public function save_contact(Request $request) {

        $contact = new Contact();
        $contact->con_nom = $request->get('name');
        $contact->con_dh = $request->get('dh');
        $contact->con_dt = $request->get('dt');
        $contact->save();

        foreach($request->get('telNro') as $key => $phoneItem){
            Phone::insert([
                'tel_nro' => $request->get('telNro')[$key],
                'tel_des' => $request->get('telDes')[$key],
                'con_id' => $contact->con_id,
            ]);
        }

        foreach($request->get('correoDir') as $key => $emailItem){
            Email::insert([
                'cor_dir' => $request->get('correoDir')[$key],
                'cor_des' => $request->get('correoDes')[$key],
                'con_id' => $contact->con_id,
            ]);
        }

        $phones = Phone::where('con_id', '=', $contact->con_id)->get();
        $emails = Email::where('con_id', '=', $contact->con_id)->get();

        $res = [
            'contacto' => $contact,
            'correos' => $emails,
            'telefonos' => $phones
        ];

        // dd($request->all());

        return redirect()->route('home');
    }

    public function detail_contact(Request $request) {
        $contact = Contact::select('*')
                ->where('con_id', '=', $request->id)
                ->where('con_sta', '=', 1)
                ->first();

        $emails = Email::select('*')
                ->where('con_id', '=', $request->id)
                ->where('cor_sta', '=', 1)
                ->get();
        $phones = Phone::select('*')
                ->where('con_id', '=', $request->id)
                ->where('tel_sta', '=', 1)
                ->get();

        $contact->emails = $emails;
        $contact->phones = $phones;

        // dd($contact);
        return view('detail_contact', compact('contact'));
    }

    public function edit_contact(Request $request) {

        $contact = Contact::find($request->id);

        $contact->update([
            'con_nom' => $request->get('name'),
            'con_dh' => $request->get('dh'),
            'con_dt' => $request->get('dt')
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Modificado correctamente',
            'res' => $contact
        ]);
    }

    public function delete_contact(Request $request) {
        $contact = Contact::find($request->get('contactId'));
        $contact->update([
            'con_sta' => 0
        ]);
        return redirect()->route('home');
    }

}
