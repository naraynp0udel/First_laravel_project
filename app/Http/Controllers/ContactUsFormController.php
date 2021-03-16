<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Contact;
 

class ContactUsFormController extends Controller {

    //  Show data in Dashbord
   public function show(){
    $data= Contact::all();
    return view('contact.store',['contacts'=>$data]);
 }

 //  Delete Data in Dashbord
 public function delete($id){
     $contact = Contact::find($id);
    $contact->delete();
    return redirect()->route('contact.index');
 }

    // Create Contact Form
    public function createForm(Request $request) {
      return view('contact');
      return redirect('admin');
    }

    // Store Contact Form data
    public function ContactUsForm(Request $request) {

        // Form validation
        $this->validate($request, [
            'name' => 'required',
            'number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => 'required|email',
            'msg'=>'required',
            
         ]);

   //  Store data in database
   Contact::create($request->all());
   
   

   //  Send mail to admin
   \Mail::send('mail', array(
       'name' => $request->get('name'),
       'number' => $request->get('number'),
       'email' => $request->get('email'),
       'msg' => $request->get('msg'),
   ), function($message) use ($request){
       $message->from($request->email);
       $message->to('narayanpoudel350@gmail.com', 'F0rce@123')->subject($request->get('msg'));
   });

   return back()->with('success', 'We have received your message and would like to thank you for connecting with us.');


   
}

public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'number' => 'required',
            'email' => 'required',
            'msg' => 'required',
        ]);

        Message::create([
            'name' => $request->name,
            'number' => $request->number,
            'email' => $request->email,
            'msg' => $request->msg,
        ]);

        return back();
        
    }

    

}