<?php

namespace App\Http\Controllers;

use Str;
use File;
use Hash;
use Session;
use Validator;
use App\Models\User;
use App\Models\fichiers;
use App\Models\messages;
use App\Services\Registrar;

use Illuminate\Http\Request;
use App\Http\Requests\FileRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MessageRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Http\FormRequest;

class MessageController extends Controller
{
   
    public function getChat(User $user)
      {
  $outgoing_id=Auth::user()->id;
  $incoming_id=$user->id;
  
  $messages = DB::table('messages')
                      ->whereOutgoing_msg_idAndIncoming_msg_id($outgoing_id,$incoming_id)
                     ->orWhere('outgoing_msg_id','=',$incoming_id)->
                     where('incoming_msg_id','=',$outgoing_id)
                     
                      ->orderBy('msg_id', 'asc')->get();
  
                     
       
  $data=[
      'messages' => $messages,
      
      'destinataire'=> $user,
      'heading' => config('app.name'), ];
        
             
      
        return view('chat.chatter', $data);
  
  
  
  
  
      }
        /**
       * Store a newly created resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @return \Illuminate\Http\Response
       */
  
      public function insert(MessageRequest $request)
      {
          DB::beginTransaction();
       
          try{
               $validated = $request->validated();
      
              
           
           
   
              
             
               $message =new messages([
                 
                   'incoming_msg_id'=> $request['incoming_id'],
                   'outgoing_msg_id' =>Auth::user()->id,
                   'msg' =>$request['message']
                 
               ]);


               $message->save();
             
           }
           
           catch(ValidationException $exception){
               DB::rollBack();
    
           }
    
           DB::commit();
    
           return redirect()->route('chat.get',$request['incoming_id']);
          
      }
}
