@extends('layouts.layout')

@section('content')
<section class="contact_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6 ">
          <div class="heading_container ">
            <h2 class="">
             Signup
            </h2>
          </div>
      @if($errors->any())
      @foreach($errors->all() as $err)
      <p class="alert alert-danger">{{  $err }}</p>
      @endforeach
      @endif


        
          <form   action=" {{ route('user.store1') }} " method="POST"  enctype="multipart/form-data"  >
            @csrf
       <input type="text" name="fname" placeholder="First Name" value="{{ old('fname')}}"/>
       <input type="text" name="lname" placeholder="Last Name" value="{{ old('lname')}}"/>
      
      
         <input type="email" name="email" placeholder="Email" value="{{ old('email')}}"/>
       
         <div class="mb-3">
          <label for="img" class="form-label">image:</label>
          <input class="form-control" type="file" id="img" name="img" accept="image/png, image/jpeg" value="{{ old('img') }}">
      </div>
        
         <input type="password" name="password" placeholder="Password " value="{{ old('password') }}"/>
         <input type="password" name="confirm_password" placeholder="Confirm Password " value="{{ old('confirm_password')}}"/>
         <select name="role" id="pet-select"  value="{{ old('role')}}">
          
           <option value="etudiant">Etudiant</option>
           <option value="enseignant">Enseignant</option>
          
       </select>
      
       <div class="btn-box">
           
         <button>
           Sign up
         </button>
       </div>
    </div>
    <div class="col-md-6">
      <div class="img-box">
        <img src="/images/contact-img.png" alt="">
      </div>
    </div>
  </div>
</div>
</form>
      @stop
      
  </section>
 