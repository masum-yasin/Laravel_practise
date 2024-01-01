<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;


class HomeController extends Controller
{
   public function index(){
    $data['title']="Home page";
    $data['welcome']='Welcome to laravel';
    $data['khiba'] = 'Tmi Banana Khaw ami Apple khi';
    $data['fruits'] = ['Apple','Banana','Orange','Mango'];
   return view('home',$data);
   }
   public function about(){
    $data['khiba'] = 'Tmi Banana Khaw ami Apple khi';
    $data['fruits'] = ['Apple','Banana','Orange','Mango'];
    return view('about',$data);
   }
   public function contact(){
    return view('contact');
   }

   
   public function store(Request $request){

      $message = [
         'name.required'=>'vahi naam  day age',
         'email.required'=>'valuable user tui ki email chara tukte prbe',
      ];
     $contact= new Contact();
     $validate= $request->validate(
      [
       'name'=>'required|min:4',  
       'email'=>'required|email', 
       'subject'=>'required|min:5' ,
       'message'=>'required|min:5'
      ],$message
     );
     if($validate){
      $data = [
         'name'=>$request->name,
         'email'=>$request->email,
         'subject'=>$request->subject,
         'message'=>$request->message,
        ];
        $contact->insert($data);
        return redirect('contact')->with('msg','We received Your message');
   
     }
     
     
   }
   public function contactList(){
      $contacts=Contact::all();
      $data['messages']= $contacts;
      return view('contactAll',$data);
   }
   public function delete($mid){
      echo $mid;
      $contact=Contact::find($mid);
    if(  $contact->delete()){
      return redirect('contactlist')->with('msg','Delete Successfully');
    }

   }
   public function edit($mid){
      $contact =Contact::find($mid);
      $data['single']=$contact;
      return view('edit',$data);
   }
   public function update(Request $request, $id){
      $contact=  Contact::find($id);
      $message = [
         'name.required'=>'vahi naam  day age',
         'email.required'=>'valuable user tui ki email chara tukte prbe',
      ];
      $validate= $request->validate(
       [
        'name'=>'required|min:4',  
        'email'=>'required|email', 
        'subject'=>'required|min:5' ,
        'message'=>'required|min:5',
       ],$message
      );
      if($validate){
       $data = [
          'name'=>$request->name,
          'email'=>$request->email,
          'subject'=>$request->subject,
          'message'=>$request->message,
         ];
         $contact->update($data);
         return redirect('/contact')->with('msg','update Successfully');
   }
}

}
