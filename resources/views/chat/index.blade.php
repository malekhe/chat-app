@extends('chat.layout')

@section('content')

@extends('chat.chatLayout')
@section('content1')
<div class="wrapper">
    <section class="form signup">
     <center> <header>Bienvenue dans votre espace de discussion!</header></center>
     
      <div class="link"><h4> <a href="{{ route('user.acess') }} ">Continuer</a></h4> <h4> <a href="{{ route('home.show') }}"> Retour </a></h4></div>
    
    </section>
  </div>
  @endsection
  @endsection