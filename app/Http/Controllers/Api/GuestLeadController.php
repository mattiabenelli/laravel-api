<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

use App\Models\GuestLead;

class GuestLeadController extends Controller
{
    public function store(Request $request){
        $form_data = $request->all();
        
        $validator = Validator::make($form_data, [
            'name' => 'required' ,
            'surname' => 'required' ,
            'phone' => 'required' ,
            'email' => 'required' ,
            'message' => 'required' ,
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        $newContact = new GuestLead();
        $newContact->fill($newContact);

        $newContact->save();

        Mail::to('info@boolpress.com')->send(GuestContact($newContact));

        return response()->json([
            'success' => true,
        ]);
    
    }
}
