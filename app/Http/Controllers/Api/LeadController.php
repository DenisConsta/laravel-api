<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request){
        $data = $request->all();
        $success = true;

        $validator = Validator::make(
            $data,
            /* rules */
            [
                'name' => 'required|min:3|max:255',
                'object' => 'required|min:3|max:255',
                'email' => 'required|email|max:255',
                'message' => 'required|min:3',
            ]
            /* messages to implement */
        );

        // controllo della validazione
        if($validator->fails()){
            $success = false;
            $errors = $validator->errors();
            return response()->json(compact('success', 'errors'));
        }else{

            // salvataggio dei dati nel DB
            $new_lead = new Lead();
            $new_lead->fill($data);
            $new_lead->save();

            /* indirizzo dell'env */
            Mail::to('info-denis@boolfolio.com')->send(new NewContact($new_lead));

            return response()->json(compact('success'));
        }



    }
}
