<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// MODELS
use App\Models\Phone;
class PhonesController extends Controller
{
    public function save_phone(Request $request) {
        $phone = new Phone();

        $phone->tel_nro = $request->get('phone');
        $phone->tel_des = $request->get('desc');
        $phone->con_id = $request->contactId;
        $phone->save();

        // dd($request->all());
        return redirect()->route('detail-contact', ['id' => $request->contactId]);
    }

    public function edit_phone(Request $request) {
        foreach($request->get('phoneId') as $key => $phoneId){
            $phone = Phone::find($phoneId);
            $phone->update([
                'tel_nro' => $request->get('phone')[$key],
                'tel_des' => $request->get('desc')[$key]
            ]);
        }

        // dd($request->all());
        return redirect()->route('detail-contact', ['id' => $request->contactId]);
    }

    public function delete_phone(Request $request) {
        $phone = Phone::find($request->id);
        $phone->update([
            'tel_sta' => 0
        ]);
        // dd($phone);
        return redirect()->route('detail-contact', ['id' => $request->contactId]);
    }
}
