<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;

class MailController extends Controller
{
    public function index()
    {
        $data = [
            'subject'=>'Transactions Reciept',
            'body'=>'Hello this is your reciept!'
        ];
        try{
            
            Mail::to('ramadianarditama66@gmail.com')->send(new MailNotify($data));
            return response()->json(['Great check your mail box']);

        }catch(Exception $th){
            return response()->json(['Sorry something went wrong']);
        }
    }
}
