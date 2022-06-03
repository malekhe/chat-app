@extends('layouts.layout')

@section('content')
  <section class="catagory_section layout_padding">
    
    <div class="catagory_container">
      <div class="container ">

   









@if(Auth::user()->role!= 'Etudiant' )
 
<form action="{{ route('cours.upload') }}" method="POST" enctype="multipart/form-data">
    @csrf
  


    <input class="btn btn-primary" type="file" name="file"  accept="file/pdf, file/txt" value="add" id="actual-btn"style="background-color: #063947;" >
   
   
    <select name="matiere" id="pet-select" style="width:5cm;">
      
   
   
    <option value="Poo">Poo</option>
    <option value="Uml">Uml</option>
    <option value="Spring Boot">Spring Boot</option>
    <option value="Laravel">Laravel</option>
    <option value="SGBD">SGBD</option>
   
</select>
    <button class="btn btn-primary" id="pet-select"  type="submit" style="padding:20px; background-color: #063947;color:white; border-radius: 10%;">
        Add File</button>
        <br>
      
 
            </form>
       

@endif



             
             
             
             
             
             
             
           
    
        <div class="heading_container heading_center">
          <h2>
            Bibliotheque de l'étudiant
          </h2>
          
        </div>
       
        <div class="row">


       
          
         
         
@foreach($fichiers as $fichier)


     
          <div class="col-sm-6 col-md-4 ">
            <div class="box ">
              <div class="img-box">
              <img src="images/cat1.png" alt="">
              </div>
              <div class="detail-box">
               
              
              
  <h5> <a  href="{{ route('cours.telecharger',$fichier->id) }}">{{$fichier->nom}}</a></h5>
  <h5>{{$fichier->matiere}} </h5> 
  <h6>{{$fichier->updated_at}} </h6> 
  @if(Auth::user()->role!='Etudiant')
  <h1><a style="color:white;" class="btn btn-danger"  href="{{ route('cours.delete',$fichier->id) }}">Supprimer</a></h1> 
 @endif
  </div>
            </div>
          </div>
   @endforeach           
</div>
        </div>
      </div>
    </div>
  </section>
  @endsection