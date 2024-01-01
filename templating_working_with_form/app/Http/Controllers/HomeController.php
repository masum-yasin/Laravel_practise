<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index(){
        return view('home');
    }
    public function about(){
        return view('layouts.about');
    }
    public function contact(){
        return view('layouts.contact');
    }
    // data send database//
   public function store(Request $req){
    $message = [
        'name.required'=>'naam day age vahi',
        'email.required'=>'valuable user tui ki email chara tukte prbe',
        'subject.required'=>'kno Email krcn apnr subject koi',
        'message.required'=>'apni validate able user na tai message krte prbn na'
     ];
      $contact = new Contact();
      $validate = $req->validate([
        'name'=>'required|min:4',
        'email'=>'required|email',
        'subject'=>'required|min:5',
        'message'=>'required|min:6'
      ],$message);
      if($validate){
        $data = [
            'name'=>$req->name,
            'email'=>$req->email,
            'subject'=>$req->subject,
            'message'=>$req->message,
        ];
        $contact->insert($data);
      return redirect('contact')->with('msg','we received message');
      }
      
   }
}

