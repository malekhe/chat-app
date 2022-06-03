<?php

namespace App\Http\Controllers;

use Str;

use Hash;

use Session;

use Validator;
use App\Models\User;
use App\Models\messages;
use App\Services\Registrar;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MessageRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Http\FormRequest;






class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
       
            DB::beginTransaction();
            try{
                
     
                $user->delete();
     
            }catch(ValidationException $e){
                DB::rollback();
            }
            DB::commit();
     
            return redirect()->route('etudiant.show');
     
        
    }
    
    
    
    function login(Request $request)
    {
          $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);
   
    if (Auth::attempt($credentials))
     {$request->session()->regenerate();
   

   
      return redirect()->intended('/');
     }
   return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');

    }

  

    function logout()
    { Auth::user()->where('id', Auth::user()->id)->update([
        'status'=> 'Offline Now',

        
    ]);
     Auth::logout();

     return redirect()->intended(  '' );
    }


       /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\UserRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function store1( UserRequest $request)
    {
        DB::beginTransaction();
     
       try{
            $validated = $request->validated();
   
            $img=null;
            $Urlimg=null;
          if($validated['password']==$validated['confirm_password'])
 
            {     
                

               
                
                if(($request->file('img')!==null)&&($request->file('img')->isValid())){
                  
                    $ext=$request->file('img')->extension();
                    $fileName=Str::uuid().'.'.$ext;
                    $img=$request->file('img')->storeAs('images',$fileName);
                    $request->file('img')->move(public_path('/images'),$fileName);
                    $Urlimg=$img;
                }
        
        

           
          
            $user =new User([
              
                'fname'=> $validated['fname'],
                'lname' => $validated['lname'],
                'email' => $validated['email'],
                'password' => bcrypt($validated['password']),
                'img' => $img,
                'Urlimg' => $Urlimg,
                'status' => 'Online Now',
                'role' => $validated['role']
            ]);
            $user->save();
            AUTH::login($user);
        }
        }catch(ValidationException $exception){
            DB::rollBack();
 
        }
 
        DB::commit();
 
        return redirect()->route('home.show');
    }
    public function acess(Request $request, User $user )
    {try{
       
        Auth::user()->where('id', Auth::user()->id)->update([
            'status'=> 'Active Now',

            
        ]);}
        catch(ValidationException $exception){
            DB::rollback();
        }

        DB::commit();

       
        return redirect()->route('users.show');
    }



    
    public function users()
    {
      $users=DB::table('users')->where('id','<>',Auth::user()->id)->get();
     
$data=[
    'users' => $users,
    'heading' => config('app.name'), ];
      
           
    
      return view('chat.chat', $data);

    }
    public function users2()
    {
      $users=DB::table('users')->where('id','<>',Auth::user()->id)->get();
     
$data=[
    'users' => $users,
    'heading' => config('app.name'), ];
      
           
    
      return view('gestionUsers.etudiant', $data);

    }
    public function users3()
    {
      $users=DB::table('users')->where('id','<>',Auth::user()->id)->get();
     
$data=[
    'users' => $users,
    'heading' => config('app.name'), ];
      
           
    
      return view('gestionUsers.prof', $data);

    }










}
