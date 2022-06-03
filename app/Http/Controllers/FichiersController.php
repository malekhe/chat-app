<?php

namespace App\Http\Controllers;

use Str;
use Hash;

use Session;



use App\Models\User;

use App\Models\fichiers;
use App\Services\Registrar;
use Illuminate\Http\Request;

use Validator;
use App\Http\Requests\FileRequest;
use File;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Http\FormRequest;






class FichiersController extends Controller
{
      /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      
        $fichiers=DB::table('fichiers')->get();
     
        $data=[
            'fichiers' => $fichiers,
            'heading' => config('app.name'), ];
              
                   
            
              return view('cours.cours', $data);

    }



    public function telecharger(fichiers $fichier)
    {
        DB::beginTransaction();
        try{
    
          
            $headers = ['Content-Type: application/pdf'];
          
    
            return response()->download($fichier->file, $fichier->nom, $headers);
        

 
        }catch(ValidationException $exception){
            DB::rollBack();
 
        }
 
        DB::commit();
 
        return redirect()->route('cours.show');
    






      


        
        
    }
    public function destroy(fichiers $fichier)
    {
        DB::beginTransaction();
        try{
            
 
            $fichier->delete();
 
        }catch(ValidationException $e){
            DB::rollback();
        }
        DB::commit();
 
        return redirect()->route('cours.show');
 
    }
    
       /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\FileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function upload (FileRequest $request)
    {

        DB::beginTransaction();
        try{
           $validated = $request->validated();
         

          if(($request->file('file')!==null)&&($request->file('file')->isValid())){
 
                $ext=$request->file('file')->extension();
                
                $fileName=Str::uuid().'.'.$ext;
               
                $file=$request->file('file')->storeAs('fichiers',$fileName);
                $request->file('file')->move(public_path('/fichiers'),$fileName);
                $urlFile=env('APP_URL').Storage::url($file);
            }
            
            $fichier =new fichiers([
              
              
                'nom'=>$_FILES['file']['name'],
                'file'=> $file,
                'urlFile'=> $urlFile,
                'matiere'=> $request['matiere'],
            ]);
            $fichier->save();
 
           
        }catch(ValidationException $exception){
            DB::rollBack();
 
        }
 
        DB::commit();
     
        return redirect()->route('cours.show');
    }
}
