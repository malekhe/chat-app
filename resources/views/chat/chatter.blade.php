
  
@extends('chat.layout')
@section('content')  


      
@extends('chat.chatLayout')
@section('content1')

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  text-decoration: none;
  font-family: 'Poppins', sans-serif;
}
body{
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background: #f7f7f7;
  padding: 0 10px;
}
.wrapper{
  background: #fff;
  max-width: 1200px;
  width: 100%;
  
  box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),
              0 32px 64px -48px rgba(0,0,0,0.5);
}





.users{
  padding: 25px 30px;
}
.users header,
.users-list a{
  display: flex;
  align-items: center;
  padding-bottom: 20px;
  border-bottom: 1px solid #e6e6e6;
  justify-content: space-between;
}
 img{
  object-fit: cover;
  border-radius: 50%;
  border:2px #000;
}
 img{
  height: 50px;
  width: 50px;
 
}
:is(.users, .users-list) .content{
  display: flex;
  align-items: center;
}
:is(.users, .users-list) .content .details{
  color: #000;
  margin-left: 20px;
}
:is(.users, .users-list) .details span{
  font-size: 18px;
  font-weight: 500;
}



.users-list{
  max-height: 350px;
  overflow-y: auto;
}
:is(.users-list, .chat-box)::-webkit-scrollbar{
  width: 0px;
}
.users-list a{
  padding-bottom: 10px;
  margin-bottom: 15px;
  padding-right: 15px;
  border-bottom-color: #f1f1f1;
}
.users-list a:last-child{
  margin-bottom: 0px;
  border-bottom: none;
}
.users-list a img{
  height: 40px;
  width: 40px;
}
.users-list a .details p{
  color: #67676a;
}
 .status-dot{

 
 
  padding-right: 20px;


}


.chat-area header{
  display: flex;
  align-items: center;
  padding: 18px 30px;
  margin-top: 1cm;
 position: relative;
}
.chat-area header .back-icon{
  color: #333;
  font-size: 18px;
}

.chat-area header .details span{
  font-size: 17px;
  font-weight: 500;
}

.chat-box .text{
  position: absolute;
  top: 45%;
  left: 50%;
  width: calc(100% - 50px);
  text-align: center;
  transform: translate(-50%, -50%);
}
.chat-box  {
 overflow:scroll;
}

 .outgoing{
  display: flex;
  align-items: flex-start;
 
}
 .outgoing .details{
  margin-left: auto;
  margin-right: 10px;
  max-width: calc(100% - 130px);
}
.outgoing .details p{
  background: #333;
  color: #fff;
  border-radius: 18px 18px 0 18px;
  padding: 15px;
 
  
}
.incoming{
  display: flex;
 
  align-items: flex-end;
}

 .incoming .details{
  
  margin-right: auto;
  margin-left: 10px;
  max-width: calc(100% - 130px);
}
.incoming .details p{
  background: rgba(231, 135, 66, 0.886);
  color: #333;
  border-radius: 18px 18px 18px 0;
  padding: 15px;
  

  
}
.typing-area{
  padding: 18px 30px;
  margin-top: 1cm;
  display: flex;
  justify-content: space-between;
}
.typing-area input{
  height: 45px;
  width: calc(100% - 58px);
  font-size: 16px;
  padding: 0 13px;
  border: 1px solid #e6e6e6;
  outline: none;
  border-radius: 5px 0 0 5px;
}
.typing-area button{
  color: #fff;
  width: 55px;
  border: none;
  outline: none;
  background: #333;
  font-size: 19px;
  cursor: pointer;
  opacity: 0.7;
 
  border-radius: 0 5px 5px 0;
  transition: all 0.3s ease;
}
.typing-area button:hover{
  opacity: 1;
  pointer-events: auto;
}



</style>
  
<link rel="stylesheet" href="css/cssChat/styleChat.css">
<div class="wrapper">
        <section class="chat-area">
          <header>
       
            <a href="{{ route('user.acess') }}" class="back-icon"><i class="fas fa-arrow-left"></i></a>
            <img src="{{$destinataire->Urlimg}}" alt=""  style="margin:20px;" >
           
            <div class="details">
             
              <span>{{$destinataire->fname}}</span>
              <span>{{$destinataire->lname}}</span>
              <p>{{$destinataire->status}}</p>
            
  
            </div>
          
         
          </header>
          <br> <br>
          <div class="chat-box">
            <div class="all">
        @foreach ($messages as $message)
      
    
      @if($message->outgoing_msg_id==Auth::user()->id)
       
       
            <div class="chat outgoing">
                        <div class="details">
                            <p>{{$message->msg}}</p>
                          
                          
                        </div>
                       
                        </div>


@else
<div class="chat incoming">
  
    <div class="details">
        <p>{{$message->msg}}</p>
    </div>
   
       </div>
       @endif

        @endforeach

      </div>
    </div>
    <form action="{{ route('message.insert') }}" methos="get" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="{{$destinataire->id}}" hidden>
  
        <input type="text" name="message" class="input-field" placeholder="Ecrire un message..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
</section>
</div>
</section>
</div>

  @endsection
  @endsection

  



