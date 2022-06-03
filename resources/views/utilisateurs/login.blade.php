@extends('layouts.layout')

@section('content')

<section class="contact_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6 ">
          <div class="heading_container ">
          
            <h2 class="">
              Log in
            </h2>
          </div>
          <form method="get"  action=" {{ route('user.login') }} " >
       @csrf
       @if (session('sucess'))
       <p class="alert alert-success">{{  session('sucess') }}</p>
       @endif
       @if($errors->any())
       @foreach($errors->all() as $err)
       <p class="alert alert-danger">{{  $err }}</p>
       @endforeach
       @endif
            <div class="error-text"></div>
        <div class="field input">
          <label>Email Address</label>
         
          <input type="text" name="email" placeholder="Enter your email" >
       
          @if ($errors->has('email'))
          <span class="text-danger">{{ $errors->first('email') }}</span>
          @endif </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password"  placeholder="Enter your password" required>
          @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Log in " style="background-color:lightblue">
        </div>
      </form>
    </div>
    <div class="col-md-6">
      <div class="img-box">
        <img src="/images/contact-img.png" alt="">
      </div>
    </div>
  </div>
</div>
      @stop
       
  </section>


