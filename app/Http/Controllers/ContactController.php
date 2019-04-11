<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //メール尊信
    public function mail(Request $request){
      // フォームからのリクエストデータ全てを$contactに代入
      $contact = $request->all();
      Mail::to($contact["email"])
                ->send(new ContactMail($contact));
      // return view("chugaku.mail",["items"=>$contact,"email"=>$contact["email"]]);
    }
}
