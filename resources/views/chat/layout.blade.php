<!DOCTYPE html>
<html>

<head>
  
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
 
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  
  <link rel="icon" href="images/favicon.png" type="image/gif" />
  <link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
  <link href="/css/font-awesome.min.css" rel="stylesheet" />
  <link href="/css/style.css" rel="stylesheet" />
  <link href="/css/responsive.css" rel="stylesheet" />

</head>

<body class="sub_page">
    <div class="hero_area">
       <header class="header_section" style="position: fixed;
        top: 0;
        left: 0; width:100%;">
          <div class="container-fluid">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
              <a class="navbar-brand" href="{{ route('home.show') }}">
                @if(Auth::id()!=null )
                @if(Auth::user()->role== 'Etudiant' )
                <span>
                 Espace  Etudiant
                </span>
                @else
                <span>
                  Espace  Enseignant
                 </span>
                 @endif
                 @else
                 <span>
                  Bibliothéque numérique
                 </span>
                 @endif
              </a>
    
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
              </button>
    
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
               
     
             
                @if(Auth::id()==null ){
    
                  <ul class="navbar-nav">
                  
                    <li class="nav-item">
                      <a class="nav-link" href="login">Log in</a>
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link" href="signup">Sign up   </a>
                    </li>
                  
                     </ul>'; 
                    
                
                  }
                  @else{
                    
                 <ul class="navbar-nav">  
                  @if(Auth::user()->role== 'Etudiant' )
                  <li class="nav-item active">
                    <a class="nav-link" href="{{ route('prof.show') }}"> Prof  </a>
                  </li>
                  @else<li class="nav-item active">
                    <a class="nav-link" href="{{ route('etudiant.show') }}"> Etudiant  </a>
                  </li>
                  @endif  <li class="nav-item active">
               
                  <a class="nav-link" href="{{ route('cours.show') }}"> Cours  </a>
                </li>
                <li class="nav-item active">
                <a class="nav-link" href="{{ route('user.acess') }} "> Chat <span class="sr-only">(current)</span> </a>
                </li>
                   <li class="nav-item active">
                  <a class="nav-link" href="{{ route('user.logout') }}">Logout</a>
                </li></ul>
                }
                
                @endif
                
                
    
    
             
                <from class="search_form">
                  <input type="text" class="form-control" placeholder="Search here...">
                  <button class="" type="submit">
                    <i class="fa fa-search" aria-hidden="true"></i>
                  </button>
                </from>
              </div>
            </nav>
          </div>
        </header>
 
@yield('content')
 



 
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/custom.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
 
 
 
</body>

</html>