<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function AllContactSend(Request $request){
        $contactArray = json_decode($request->getContent(),true);
        $name=$contactArray['name'];
        $email=$contactArray['email'];
        $message=$contactArray['message'];
        $result = Contact::insert([
            'name'=>$name,
            'email'=>$email,
            'message'=>$message

        ]);
        if($result == true){
            return 1;
        }
        else{
            return 0;
        }

    }
}
