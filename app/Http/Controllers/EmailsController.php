<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// MODELS
use App\Models\Email;

class EmailsController extends Controller
{
    public function save_email(Request $request) {
        $email = new Email();

        $email->cor_dir = $request->get('email');
        $email->cor_des = $request->get('desc');
        $email->con_id = $request->contactId;
        $email->save();

        // dd($request->all());
        return redirect()->route('detail-contact', ['id' => $request->contactId]);
    }

    public function edit_email(Request $request) {
        foreach($request->get('emailId') as $key => $emailId){
            $email = Email::find($emailId);
            $email->update([
                'cor_dir' => $request->get('email')[$key],
                'cor_des' => $request->get('desc')[$key]
            ]);
        }

        return redirect()->route('detail-contact', ['id' => $request->contactId]);
    }

    public function delete_email(Request $request) {
        $email = Email::find($request->id);
        $email->update([
            'cor_sta' => 0
        ]);
        // dd($email);
        return redirect()->route('detail-contact', ['id' => $request->contactId]);
    }
}
