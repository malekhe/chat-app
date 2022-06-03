
  
@extends('chat.layout')
@section('content')  


      
@extends('chat.chatLayout')
@section('content1')



<div class="wrapper">
        <section class="users">
          <header>
          <div class="content">
            <a href="{{ route('home.show') }}" class="back-icon"><i class="fas fa-arrow-left"></i></a>
            <img src="{{Auth::user()->Urlimg}}" alt="" style="margin:20px;">
            <div class="details">
             
              <span>{{Auth::user()->fname}}</span>
              <span>{{Auth::user()->lname}}</span>
              <p>{{Auth::user()->status}}</p>
  
            </div>
          </div>
         
          </header>

          
          <br> <br>
          <div claas="users-list">
        @foreach ($users as $user)
      
 
      {{--   <a href="{{route('chat.get', [$user])}}"> --}}
       
        <a href="{{route('chat.get', $user->id)}}">
          
            <div class="content">
              <div class="status-dot" ><i class="fas fa-circle"></i></div>
            <img src="{{$user->Urlimg}}" alt=""  style=" height: 50px;
            width: 50px;">
            <div class="details">
                <span> {{$user->fname." ".$user->lname}}</span>
                <p>{{$user->status}}</p>
            </div>
           
          </div>

        
          
           
            
        </a>
        <hr>
        @endforeach
      </div>
    </section>
  </div>
    </section>
  </div>
  @endsection
  @endsection
  
